# Housing Prices Dataset — بيانات عقارات

## Description
Prices for 400 properties across 5 locations, with their area, room count, and year built.
أسعار 400 عقار عبر 5 مناطق مختلفة، بمساحاتها وعدد غرفها وسنة بنائها.

## Real Extracted Stats
- **Rows:** 400
- **Columns:** 6
- **Numeric columns:** house_id, area_m2, rooms, year_built, price
- **Categorical columns:** location
- **Missing values:** 0 total across all columns

## Columns
- `house_id` (int64)
- `area_m2` (float64)
- `rooms` (int64)
- `location` (str)
- `year_built` (int64)
- `price` (float64)

## Sample Rows (first 3, real data from the file)
```
 house_id  area_m2  rooms location  year_built     price
        1     84.5      2 Downtown        2014  99598.74
        2    179.9      4 Downtown        1977 188232.87
        3    150.8      4    Rural        1984  56770.85
```

## Business Questions This Dataset Can Answer
- How does price vary by location?
- Is there a correlation between area and price?
- Which properties are price outliers?

## Source
Synthetically generated with a fixed random seed for Sila's Data Analysis track — reproducible, internally consistent, and realistic, but not scraped real-world data. Every statistic in this README was computed directly from `dataset.csv`, not estimated.
