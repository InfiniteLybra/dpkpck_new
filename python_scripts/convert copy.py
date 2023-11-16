import geopandas as gpd
import zipfile
import os
import sys

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

    # Konversi geometri ke latlng (WGS 84)
    gdf.to_crs(epsg=4326, inplace=True)

   # Dapatkan koordinat latlng sebagai daftar
    coordinates = [(coord[1], coord[0]) for polygon in gdf.geometry for coord in polygon.exterior.coords]


    # Sekarang, Anda memiliki daftar koordinat latlng yang dapat digunakan.
    print(coordinates)
else:
    print("Tidak ada berkas SHP yang sesuai dengan nama berkas ZIP.")
