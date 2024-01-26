<?php
require_once "../controller/ProductController.php";

$controller = new ProductController();
$products = $controller->index();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1. 0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    <div class="flex justify-between my-5">
        <h1>Product Table</h1>

        <div class="mr-10 ">
            <a class="bg-green-700 rounded-md shadow-xl py-2 px-5 text-white" href="products/create.php">ADD +</a>
        </div>
    </div>





    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Product name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Product Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Product Stock
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        created at
                    </th>
                    <th scope="col" class="px-6 py-3">
                        updated at
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b  dark:border-gray-700">
                    <th scope="row" class="px-6 py-0font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?php foreach ($products as $product) : ?>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?php echo $product->name; ?>
                    </td>
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?php echo $product->price; ?>
                        </th>
                        
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?php echo $product->stock; ?>
                    </td>
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?php echo $product->category; ?>
                    </td>
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?php echo $product->created_at; ?>
                    </td>
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?php echo $product->updated_at; ?>
                    </td>
                    <td scope="row" class="px-6 py-3">
                        <a class="px-5 py-2 rounded-md bg-blue-600 text-white" href="products/edit.php? id=<?php echo $product->id; ?>">edit</a>

                        <a class="px-5 py-2 rounded-md bg-red-600 text-white" href="products/destroy.php?id=<?php echo $product->id; ?>">delete</a>

                    </td>
                </tr>
                </tr>
                </tr>
                </tr>
            <?php endforeach ?>
            </tr>

            </tbody>
        </table>
    </div>



</body>

</html>