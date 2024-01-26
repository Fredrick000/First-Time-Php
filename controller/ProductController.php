<?php

require_once "../helper/database.php";

class ProductController extends DB
{
    public function index()
    {
        $statement = $this->pdo->query("select * from products");
        $products = $statement->fetchAll(pdo::FETCH_OBJ);
        return $products;
    }
   
    public function store($request)
    {
        try{        
            $statement = $this->pdo->prepare("  
            insert into products 
                     (name,price,stock,category, created_at, updated_at)
                    values
                        (:name, :price, :stock, :category,now(),now());  
                ");
        
                $statement->bindParam(":name", $request["name"]);
                $statement->bindParam(":price", $request["price"]);
                $statement->bindParam(":stock", $request["stock"]);
                $statement->bindParam(":category", $request["category"]);
                if ($statement->execute())
                {
                    header("Location:http://localhost:8000/products");
                } else {
                    throw new Exception("Error while creating a new product!");
                }
        
            }catch (Exception $e) {
                echo $e->getMessage();
            }
    }
    public function edit () 
    {
        try{
            $db = new DB();
        
           
            $statement = $db->pdo->prepare("select * from products where id = :id");
            
            $statement->bindParam(":id",$_GET["id"]);
            
            if ($statement->execute()) {
            
                $product = $statement->fetch(pdo::FETCH_OBJ);
                return $product;
            
            
            }else {
            
                throw new Exception("Error");
            
            }
        
        }catch (Exception $e) {
        
            echo $e->getMessage();
        
        }
    }

    public function update($request, $id)
    {
        try{

            $db = new DB();
            $statement = $db->pdo->prepare("  
                update products 
                    set 
                    
                    name =:name, price = :price, category = :category, stock = :stock ,updated_at = now()
                    
                    where id =:id
                ");
                $statement->bindParam(":id", $id);
                $statement->bindParam(":name", $request["name"]);
                $statement->bindParam(":price", $request["price"]);
                $statement->bindParam(":stock", $request["stock"]);
                $statement->bindParam(":category", $request["category"]);

                if ($statement->execute())
                {
                    header("Location:http://localhost:8000/products");
                } else {
                    throw new Exception("Error while updating product!");
                }
        
        
        }catch (Exception $e) {
            echo $e->getMessage();
        }
        
    }
    
    public function destroy($id)
    {
        try{        
        
            $statement = $this->pdo->prepare("delete from products where id = :id");
        
            $statement->bindParam(":id", $id);
        
            if ($statement->execute())
        
            {
                
                header("Location:http://localhost:8000/products ");
        
            } else {
        
                throw new Exception("Error while creating a new product!");
        
            }
        
        }catch (Exception $e) {
        
            echo $e->getMessage();
        
        }
    }
}

            

  