# Customers Dataset — بيانات العملاء

## Description
A profile per customer: age, country, order count, total spend, and last purchase date.
ملف تعريف لكل عميل: عمره، بلده، عدد طلباته، إجمالي إنفاقه، وآخر عملية شراء.

## Real Extracted Stats
- **Rows:** 300
- **Columns:** 6
- **Numeric columns:** customer_id, age, orders, revenue
- **Categorical columns:** country, last_purchase_date
- **Missing values:** 0 total across all columns

## Columns
- `customer_id` (int64)
- `age` (int64)
- `country` (str)
- `orders` (int64)
- `revenue` (float64)
- `last_purchase_date` (str)

## Sample Rows (first 3, real data from the file)
```
 customer_id  age      country  orders  revenue last_purchase_date
           1   23       Jordan       3   560.62         2024-06-20
           2   34        Egypt       8   871.38         2024-04-05
           3   30 Saudi Arabia       7   572.75         2024-09-15
```

## Business Questions This Dataset Can Answer
- Who are the top customers by revenue?
- What is the average order value per customer?
- Which country has the most valuable customers?

## Source
Synthetically generated with a fixed random seed for Sila's Data Analysis track — reproducible, internally consistent, and realistic, but not scraped real-world data. Every statistic in this README was computed directly from `dataset.csv`, not estimated.
