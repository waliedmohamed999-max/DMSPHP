# Employees (HR) Dataset — بيانات الموظفين

## Description
Data for 250 employees across 6 departments: salary, experience, performance score, and attrition.
بيانات 250 موظف عبر 6 أقسام: الراتب، الخبرة، تقييم الأداء، ومعدل ترك الخدمة.

## Real Extracted Stats
- **Rows:** 250
- **Columns:** 7
- **Numeric columns:** employee_id, age, experience_years, salary, performance_score
- **Categorical columns:** department, attrition
- **Missing values:** 0 total across all columns

## Columns
- `employee_id` (int64)
- `department` (str)
- `age` (int64)
- `experience_years` (int64)
- `salary` (float64)
- `performance_score` (float64)
- `attrition` (str)

## Sample Rows (first 3, real data from the file)
```
 employee_id  department  age  experience_years   salary  performance_score attrition
           1 Engineering   31                 5 10534.83                4.9        No
           2   Marketing   23                 1  6515.37                4.7        No
           3 Engineering   25                 1  9700.45                3.1        No
```

## Business Questions This Dataset Can Answer
- How does salary vary by department?
- Is there a relationship between performance and attrition?
- What is the average experience per department?

## Source
Synthetically generated with a fixed random seed for Sila's Data Analysis track — reproducible, internally consistent, and realistic, but not scraped real-world data. Every statistic in this README was computed directly from `dataset.csv`, not estimated.
