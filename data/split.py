# https://stackoverflow.com/questions/41321082/pandas-split-large-excel-file
import numpy as np
import pandas as pd
file_name=r"C:\xampp\htdocs\desinventar\data\DesInventar2016.xlsx";
    
chunksize = 1000
df = pd.read_excel(file_name)
i=0
for chunk in np.array_split(df, len(df) // chunksize):
    chunk.to_excel(r'C:\xampp\htdocs\desinventar\data\splitted\DesInventar2016-{:02d}.xlsx'.format(i), index=False)
    i += 1
