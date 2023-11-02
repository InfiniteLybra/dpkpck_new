import geopandas as gpd
import zipfile
import os
import sys

# Ambil path ke file ZIP dari argumen
zip_path = sys.argv[1]

# Ganti dengan path untuk direktori ekstraksi
extracted_dir = "saveshp/"

# Ekstrak ZIP
with zipfile.ZipFile(zip_path, 'r') as zip_ref:
    zip_ref.extractall(extracted_dir)

# Dapatkan daftar nama file dalam ZIP
zip_file_list = zip_ref.namelist()

# Cari file SHP dalam daftar nama file
shp_file = [file for file in zip_file_list if file.endswith(".shp")]

if len(shp_file) > 0:
    # Jika file SHP ditemukan, gunakan yang pertama
    shapefile_path = os.path.join(extracted_dir, shp_file[0])

    # Baca file SHP menggunakan geopandas
    gdf = gpd.read_file(shapefile_path)

    # Konversi GeoDataFrame ke GeoJSON
    geojson = gdf.to_json()

    # Cetak GeoJSON ke stdout
    print(geojson)
else:
    print("Tidak ada file SHP dalam ZIP.")
