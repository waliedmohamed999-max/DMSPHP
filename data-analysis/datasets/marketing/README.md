# Marketing Campaigns Dataset — بيانات حملات تسويقية

## Description
Performance of 6 marketing campaigns across 5 ad channels: spend, impressions, clicks, and conversions.
أداء 6 حملات تسويقية عبر 5 قنوات إعلانية مختلفة: الإنفاق، الظهور، النقرات، والتحويلات.

## Real Extracted Stats
- **Rows:** 30
- **Columns:** 8
- **Numeric columns:** campaign_id, spend, impressions, clicks, conversions, revenue
- **Categorical columns:** campaign, channel
- **Missing values:** 0 total across all columns

## Columns
- `campaign_id` (int64)
- `campaign` (str)
- `channel` (str)
- `spend` (float64)
- `impressions` (int64)
- `clicks` (int64)
- `conversions` (int64)
- `revenue` (float64)

## Sample Rows (first 3, real data from the file)
```
 campaign_id    campaign    channel   spend  impressions  clicks  conversions  revenue
           1 Summer Sale   Facebook 1631.26       155974    3101          179  6857.86
           2 Summer Sale Google Ads 2623.19       211843    2993          347 25441.74
           3 Summer Sale  Instagram 2318.27       213763    8266          446 25774.82
```

## Business Questions This Dataset Can Answer
- Which campaign performs best?
- Which campaign has the highest ROI?
- Does higher spend generate more revenue?
- Which channel has the highest conversion rate?

## Source
Synthetically generated with a fixed random seed for Sila's Data Analysis track — reproducible, internally consistent, and realistic, but not scraped real-world data. Every statistic in this README was computed directly from `dataset.csv`, not estimated.
