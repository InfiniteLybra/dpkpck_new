import geopandas as gpd
import zipfile
import os
import sys

def dd_to_dms(coordinate):
    """Konversi koordinat dari derajat desimal (DD) ke derajat menit detik (DMS)."""
    degrees = int(coordinate)
    minutes = int((coordinate - degrees) * 60)
    seconds = ((coordinate - degrees - minutes / 60) * 3600)
    
    return degrees, abs(minutes), abs(seconds)

if len(sys.argv) != 2:
    print("Usage: python read_shp_from_zip.py <zip_file>")
    sys.exit(1)

zip_file_path = sys.argv[1]

# Ekstrak file SHP dari ZIP
output_dir = "extracted_data"
with zipfile.ZipFile(zip_file_path, 'r') as zip_ref:
    zip_ref.extractall(output_dir)

# Ambil nama berkas ZIP tanpa ekstensi
zip_file_name = os.path.splitext(os.path.basename(zip_file_path))[0]

# Mencari berkas SHP yang sama dengan nama berkas ZIP
shp_file = os.path.join(output_dir, f"{zip_file_name}.shp")

if os.path.exists(shp_file):
    # Baca file SHP
    gdf = gpd.read_file(shp_file)

    # Konversi geometri ke latlng (WGS 84) dan ubah ke format DMS
    gdf.to_crs(epsg=4326, inplace=True)
    gdf['latitude_dms'] = gdf['geometry'].apply(lambda geom: dd_to_dms(geom.centroid.y))
    gdf['longitude_dms'] = gdf['geometry'].apply(lambda geom: dd_to_dms(geom.centroid.x))

    # Dapatkan koordinat latlng sebagai daftar DMS
    coordinates_dms = [(dd_to_dms(coord[1]), dd_to_dms(coord[0])) for coord in zip(gdf['latitude_dms'], gdf['longitude_dms'])]

    # Sekarang, Anda memiliki daftar koordinat DMS yang dapat digunakan.
    print(coordinates_dms)
else:
    print("Tidak ada berkas SHP yang sesuai dengan nama berkas ZIP.")
