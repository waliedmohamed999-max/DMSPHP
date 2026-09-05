# Sales Dataset — بيانات المبيعات

## Description
A multi-category retail store's sales across 5 regions in Egypt over a full year (2024).
مبيعات محل تجزئة متعدد الفئات عبر 5 مناطق في مصر خلال سنة كاملة (2024).

## Real Extracted Stats
- **Rows:** 600
- **Columns:** 10
- **Numeric columns:** order_id, customer_id, quantity, price, discount, revenue
- **Categorical columns:** order_date, product, category, region
- **Missing values:** 0 total across all columns

## Columns
- `order_id` (int64)
- `order_date` (str)
- `customer_id` (int64)
- `product` (str)
- `category` (str)
- `quantity` (int64)
- `price` (float64)
- `discount` (float64)
- `region` (str)
- `revenue` (float64)

## Sample Rows (first 3, real data from the file)
```
 order_id order_date  customer_id      product       category  quantity  price  discount     region  revenue
    10000 2024-06-25           84 Coffee Maker Home & Kitchen         1  60.04      0.00   Mansoura    60.04
    10001 2024-08-25            9     Yoga Mat         Sports         1  48.07      0.00 Alexandria    48.07
    10002 2024-09-03           18      Perfume         Beauty         1  12.01      0.05   Mansoura    11.41
```

## Business Questions This Dataset Can Answer
- Which category generates the highest revenue?
- Which region has the most orders?
- Is revenue increasing over the months?
- What is the average order value?

## Source
Synthetically generated with a fixed random seed for Sila's Data Analysis track — reproducible, internally consistent, and realistic, but not scraped real-world data. Every statistic in this README was computed directly from `dataset.csv`, not estimated.
