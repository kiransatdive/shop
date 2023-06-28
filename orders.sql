CREATE TABLE orders (
  order_id INT AUTO_INCREMENT PRIMARY KEY,
  order_date DATE,
  company VARCHAR(255),
  owner VARCHAR(255),
  item VARCHAR(255),
  quantity INT,
  weight FLOAT,
  request_for_shipment VARCHAR(255),
  tracking_id VARCHAR(255),
  shipment_size VARCHAR(255),
  box_count INT,
  specification VARCHAR(255),
  checklist_quantity VARCHAR(255)
);
