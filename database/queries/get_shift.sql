use aplikasi_kasir;
SELECT shifts.*, stores.name AS store_name FROM shifts INNER JOIN stores ON shifts.store_id = stores.id WHERE stores.admin_id = 1