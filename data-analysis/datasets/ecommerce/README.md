# E-Commerce Sales Dataset — بيانات متجر إلكتروني

## Description
Orders from a regional e-commerce store selling across 6 countries over a full year.
طلبات متجر إلكتروني إقليمي يبيع في 6 دول عربية عبر سنة كاملة.

## Real Extracted Stats
- **Rows:** 1500
- **Columns:** 10
- **Numeric columns:** order_id, customer_id, quantity, price, discount, revenue
- **Categorical columns:** order_date, product, category, country
- **Missing values:** 0 total across all columns

## Columns
- `order_id` (int64)
- `customer_id` (int64)
- `order_date` (str)
- `product` (str)
- `category` (str)
- `quantity` (int64)
- `price` (float64)
- `discount` (float64)
- `country` (str)
- `revenue` (float64)

## Sample Rows (first 3, real data from the file)
```
 order_id  customer_id order_date         product category  quantity  price  discount      country  revenue
   500000          370 2024-01-12    Toys Item 16     Toys         1  44.34      0.00          UAE    44.34
   500001          343 2024-04-15  Grocery Item 9  Grocery         5  64.80      0.10 Saudi Arabia   291.60
   500002          190 2024-07-07 Grocery Item 39  Grocery         5  88.32      0.05      Lebanon   419.52
```

## Business Questions This Dataset Can Answer
- What is total revenue?
- What is average order value?
- Which category sells most?
- Which country generates the most sales?
- Are discounts related to revenue?

## Source
Synthetically generated with a fixed random seed for Sila's Data Analysis track — reproducible, internally consistent, and realistic, but not scraped real-world data. Every statistic in this README was computed directly from `dataset.csv`, not estimated.
