import geopandas as gpd
import zipfile
import sys
import os

# Ambil argumen file GeoJSON dan SHP dari baris perintah
geojson_file = sys.argv[1]
shp_file = sys.argv[2]

# Baca data GeoJSON
gdf = gpd.read_file(geojson_file)

# Simpan sebagai file SHP
gdf.to_file(shp_file)

# Buat ZIP file yang berisi file SHP, SHX, dan DBF
shp_base = os.path.splitext(shp_file)[0]
zip_file = shp_base + '.zip'
with zipfile.ZipFile(zip_file, 'w', zipfile.ZIP_DEFLATED) as zf:
    zf.write(shp_file, os.path.basename(shp_file))
    zf.write(shp_base + '.shx', os.path.basename(shp_base + '.shx'))
    zf.write(shp_base + '.dbf', os.path.basename(shp_base + '.dbf'))
    zf.write(shp_base + '.cpg', os.path.basename(shp_base + '.cpg'))
    zf.write(shp_base + '.prj', os.path.basename(shp_base + '.prj'))

# Print nama file ZIP untuk digunakan dalam fungsi PHP
print(shp_file + '.zip')

