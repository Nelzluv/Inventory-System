<?php
    Class Product {
        private $db, $product_name, $product_id, $product_qty, $supplier, $result, 
        $customer_name, $customer_address, $cost, $new_product_qty, $prod_result;
        public function __construct(){
            $this->db = new Database();
        }

        public function addProduct($product_info){
            $this->product_name = $product_info['product_name'];
            $this->unit_price = $product_info['unit_price'];
            $this->supplier = $product_info['supplier'];

            
            //Insert values into db
            $this->db->query('INSERT INTO product (product_name, unit_price, suppliers) VALUES (:product_name, :unit_price, :supplier)');

            //Bind Values
            $this->db->bind(':product_name', $this->product_name);
            $this->db->bind(':unit_price', $this->unit_price);
            $this->db->bind(':supplier', $this->supplier);

            if($this->db->execute()){
                echo "Product successfully added";
                return true;
            } else {
                return false;
            }
        }

        //Add items to General stock table
        public function addStock($product_info){
            $this->product_name = $product_info['stock_name'];
            $this->product_qty = $product_info['product_qty'];
            $this->supplier = $product_info['supplier'];
            $this->unit_price = $product_info['unit_price'];
           
            //Insert values into db
            $this->db->query('INSERT INTO stocks (product_name, product_qty, supplier, unit_price) VALUES (:product_name, :product_qty, :supplier, :unit_price)');

            //Bind Values
            $this->db->bind(':product_name', $this->product_name);
            $this->db->bind(':product_qty', $this->product_qty);
            $this->db->bind(':supplier', $this->supplier);
            $this->db->bind(':unit_price', $this->unit_price);

            if($this->db->execute()){
                echo "<script>location.href='view_stocks.php';</script>";
                return true;
            } else {
                return false;
            }
        }

        //Add items to General stock table
        /*
            Check if item exist in stock record
                if it exist
                    check if the quantity in db is less than the record been inputed 
                        if it is, subtract qty from that in the db
                        input record into sales table
                    else
                        display error that the qty in db is less than that in record
                else
                    display item not found in stock
        */
        public function addSales($product_info){
            if($this->chkProduct($product_info['product_name'])){
                echo "Product does not exist";
            } else {
               if($this->chkProductQty($product_info['product_name'], $product_info['product_qty'])){
                   //subtract the requested quantity from the stock table
                   if($this->removeFromQty($product_info['product_name'], $product_info['product_qty'])){
                        //Assigned values to variables
                        $this->customer_name = $product_info['customer_name'];
                        $this->customer_address = $product_info['customer_address'];
                        $this->product_name = $product_info['product_name'];
                        $this->product_qty = $product_info['product_qty'];
                        $this->cost = $product_info['cost'];
            
                        //Insert values into db
                        $this->db->query('INSERT INTO sales (customer_name, customer_address, product_name, product_qty, cost) VALUES (:customer_name, :customer_address, :product_name, :product_qty, :cost)');
            
                        //Bind Values
                        $this->db->bind(':customer_name', $this->customer_name);
                        $this->db->bind(':customer_address', $this->customer_address);
                        $this->db->bind(':product_name', $this->product_name);
                        $this->db->bind(':product_qty', $this->product_qty);
                        $this->db->bind(':cost', $this->cost);
            
                        if($this->db->execute()){
                            echo "Sales record has been added";
                            echo "<script>location.href='view_sales.php';</script>";
                            return true;
                        } else {
                            return false;
                        }
                    }
               } else {
                   echo "Something went wrong";
                   return false;
                }
            }
        }

        //Remove item from sales record and add quantity back to stock
        public function removeQty($product_info){
            //Assigned values to variables
            $this->product_id = $product_info['product_id'];
            $this->product_name = $product_info['product_name'];
            $this->product_qty = $product_info['product_qty'];
            
            $this->db->query('delete from sales where id = :product_id');
            $this->db->bind(':product_id', $this->product_id);

            if ($this->db->execute()) {
                $this->db->query('select * from stocks where product_name = :product_name');
                $this->db->bind(':product_name', $this->product_name);
                if($this->prod_result = $this->db->single()){
                    $this->new_product_qty = $this->prod_result->product_qty + $this->product_qty;
                    $this->db->query('UPDATE stocks SET product_qty = :product_qty WHERE product_name = :product_name');
                    $this->db->bind(':product_qty', $this->new_product_qty);
                    $this->db->bind(':product_name', $this->product_name);
                    if ($this->db->execute()) {
                        echo "<script>location.href='../view_sales.php';</script>";
                        return true;
                    } else {
                        return false;
                    }
                }
            } else {
                return false;
            }
           
        }

        //Check product name
        public function chkProduct($product_name){
            $this->db->query('select product_name from stocks where product_name = :product_name');
            $this->db->bind(':product_name', $product_name);
            if ($this->db->single()) {
                return false;
            } else {
                return true;
            }
        }

        //Check if qty in db is less than the incoming sales record
        public function chkProductQty($product_name, $product_qty){   
            $this->db->query('select product_qty from stocks where product_name = :product_name');
            $this->db->bind(':product_name', $product_name);
            if ($result = $this->db->single()) {
                if($result->product_qty > $product_qty){
                    return true;
                } else {
                    echo "The product quantity requested for exceed our stock";
                    exit;
                }
            } else {
                return false;
            }
        }

        //Remove certain quantities from the stock when a purchase happen
        public function removeFromQty($product_name, $product_qty){   
            $this->db->query('select * from stocks where product_name = :product_name');
            $this->db->bind(':product_name', $product_name);
            if ($this->result = $this->db->single()) {
                $this->new_product_qty = $this->result->product_qty - $product_qty;
                $this->db->query('update stocks set product_qty = :new_product_qty where product_name = :product_name');
                $this->db->bind(':new_product_qty', $this->new_product_qty);
                $this->db->bind(':product_name', $product_name);
                if($this->db->execute()){
                    return true;
                    } else {
                    return false;
                    }
                } else {
                return false;
            }
        }

        //Select all products from sales record
        public function getRecords($table){
            $this->db->query('select * from '.$table);
            if ($this->result = $this->db->resultSet()) {
                return $this->result;
            }
        }

        
    }

?>