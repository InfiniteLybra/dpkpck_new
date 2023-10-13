import sys
import geopandas as gpd
import os
import zipfile
import shutil

def convert_geojson_to_shp(geojson_file_path, zip_file_path):
    print("Converting GeoJSON to Shapefile...")
    # Extract the base name of the GeoJSON file (without extension)
    geojson_base_name = os.path.splitext(os.path.basename(geojson_file_path))[0]

    # Load GeoJSON file using GeoPandas
    gdf = gpd.read_file(geojson_file_path)

    # Create a temporary directory to store the Shapefile
    temp_dir = "temp_shapefile"
    os.makedirs(temp_dir, exist_ok=True)

    # Save as Shapefile in the temporary directory
    temp_shp_path = os.path.join(temp_dir, geojson_base_name)
    gdf.to_file(temp_shp_path)

    # Create a zip file
    with zipfile.ZipFile(zip_file_path, 'w') as zipf:
        # Add Shapefile and associated files to the zip
        for root, dirs, files in os.walk(temp_shp_path):
            for file in files:
                zipf.write(os.path.join(root, file), arcname=os.path.relpath(os.path.join(root, file), temp_shp_path))

    # Clean up the temporary directory
    shutil.rmtree(temp_dir)

    print("Conversion successful. Shapefile and associated files zipped as: {}".format(zip_file_path))

if __name__ == "__main__":
    if len(sys.argv) == 3:
        geojson_file_path = sys.argv[1]
        zip_file_path = sys.argv[2]
        convert_geojson_to_shp(geojson_file_path, zip_file_path)
    else:
        print("Usage: python convert_geojson_to_zip.py <geojson_file_path> <zip_file_path>")
