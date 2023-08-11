USE aplikasi_kasir;
SELECT * FROM prices;
-- SELECT prices.id, prices.admin_id, products.name, prices.price FROM prices INNER JOIN products ON products.id = prices.product_id WHERE store_id = '1' AND prices.active = '1';
-- SELECT products.name FROM products WHERE id NOT IN (SELECT prices.product_id FROM prices WHERE store_id = '1') AND admin_id = '1';