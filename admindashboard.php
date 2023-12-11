<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        #container {
            display: flex;
        }

        #sidebar {
            height:100vh;
            background-color: #333;
            color: #fff;
            padding: 20px;
            min-width: 200px;
        }

        .item {
            padding: 10px;
            cursor: pointer;
            border-bottom: 1px solid #555;
        }

        #main {
            flex-grow: 1;
            padding: 20px;
        }

        .category {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .category-item img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .category-item:hover {
            transform: scale(1.02); /* Slight scale on hover */
        }

        .category-buttons {
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin-top: 15px;
        }
      
        .category-buttons button {
            flex-grow: 1;
            padding: 10px;
            cursor: pointer;
            border-radius: 5px;
        }

        .deleterice, .deletecurry, .deletejuice ,.delete,#canceled{
            background-color: #e74c3c;  
            color: #fff;
            margin-right: 10px;
        }

        #viewrice, #viewcurry, #viewjuice ,#edit{
            background-color: #2ecc71; 
            color: #fff;
            margin-left: 10px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;

        }

        .category {
            background-color: #fff;
            padding: 20px;
            margin-top: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        button.newcategory ,.adddiscountbutton,.foodsubmit{
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 12px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease-in-out;
            width: 100%;
            display: inline-block;
        }
        #started{
            background-color: #2ecc58;
        }
        #packed{
            background-color: #ccc42e;
        }
        #finished{
            background-color: #cc7d2e;
        }
        
        button.newcategory,.adddiscountbutton,.foodsubmit:hover {
            background-color: #2980b9;
        }
        .tablebutton {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            justify-content: flex-start;
            align-items: center;
        }

        .tablebutton button {
            width: calc(25% - 10px); /* 25% to evenly distribute in a row, subtracting gap */
            padding: 10px;
            border: none;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        h4{
            margin-top: 0px;
        } 
        .ordermain ,.discountmain ,#ricedishes,#currydishes,#juicedishes,#feedback{
            display: none;
            padding: 20px;

        }  
        .adddiscount,.category-item,.newfood {
            width: calc(33.333% - 127px);
            background-color: #fff;
            padding: 20px;
            margin-top: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        tr:hover {
            background-color: #f5f5f5;
        }

        th {
            background-color: #333;
            color: white;
        }
        
        .dishestablebutton button {
            width: calc(25% - 10px); /* 25% to evenly distribute in a row, subtracting gap */
            padding: 10px;
            border: none;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }
       
        
        
    </style>
</head>
<body>
    <div id="container">
        <div id="sidebar">
            <div class="item" id="food">Food</div>
            <div class="item" id="order">Orders</div>
            <div class="item" id="discount">Discount</div>
            <div class="item" id="customers">Customer Managment</div>
            <div class="item" id="feedbacksidebar">Feedback</div>

        </div>
        <div id="main">
            <div class="category">
                <div class="category-item" id="rice">
                    <h4>Rice</h4>
                    <img src="Biriyani.jpg" alt="Biriyani">
                    <p id="price">This is the category which contains all the rice items including Biriyani, Kuzhimandi, etc...</p>                   
                    <div class="category-buttons">
                        <button class="deleterice">Delete</button>
                        <button id="viewrice">View</button>
                    </div>
                </div>
                <div class="category-item" id="curry">
                    <h4>Curry</h4>
                    <img src="Chicken-Curry-recipe-750x750.jpg" alt="Chicken Curry">
                    <p id="pcurry">This is the category which contains all the curry items including Paneer, chicken...</p>
                    <div class="category-buttons">
                        <button class="deletecurry">Delete</button>
                        <button id="viewcurry">View</button>
                    </div>
                </div>
                <div class="category-item" id="juice">
                    <h4>Juice</h4>
                    <img src="lime-juice.jpg" alt="Lime Juice">
                    <p id="pjuice">This is the category which contains all the juice items including tea, coffee, lime, etc...</p>
                    <div class="category-buttons">
                        <button class="deletejuice">Delete</button>
                        <button id="viewjuice">View</button>
                    </div>
                </div>
                
                
                <div class="add">
                    <label for="categoryname">Category Name</label>
                    <input type="text" id="categoryname" placeholder="Enter category name">
            
                    <label for="image">Image</label>
                    <input type="file" id="image">
            
                    <label for="description">Description</label>
                    <input type="text" id="description" placeholder="Enter description">
            
                    <button class="newcategory">Add Category</button>
                </div>
            </div><!-- close of category tag -->
            <div id="dishes">
                <div id="ricedishes">
                    <table id="ricedishestable">
                        <tr>
                            <th>Sl.No</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Action</th>

                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Chicken Biriyani</td>
                            <td>100</td>
                            <td><img src="Biriyani.jpg" alt="Biriyani" width="150"></td>
                            <td>Spicy special thalaserry biriyani</td>
                            <td class="dishestablebutton"><button id="edit">Edit</button><button class="delete">Delete</button></td>

                        </tr>
                    </table>
                    <div class="newfood">
                            <label for="foodname">Name</label>
                            <input type="text" name="name" id="foodname" placeholder="Food Name">

                            <label for="foodprice">Price</label>
                            <input type="text" name="name" id="Price" placeholder="Price">

                            <label for="foodimage">Image</label>
                            <input type="file" name="name" id="image" placeholder="Image">

                            <label for="fooddescription">Description</label>
                            <input type="Description" name="name" id="Description" placeholder="Description">
                            <button class="foodsubmit">ADD</button>
    
                    </div>
                </div><!--close of rice dishes-->
                <div id="currydishes">
                    <table id="currydishestable">
                        <tr>
                            <th>Sl.No</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Action</th>

                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Chicken Curry</td>
                            <td>50</td>
                            <td><img src="Chicken-Curry-recipe-750x750.jpg" alt="chicken curry" width="150"></td>
                            <td>Tasty kerala chicken curry</td>
                            <td class="dishestablebutton"><button id="edit">Edit</button><button class="delete">Delete</button></td>

                        </tr>
                    </table>
                    <div class="newfood">
                            <label for="foodname">Name</label>
                            <input type="text" name="name" id="foodname" placeholder="Food Name">

                            <label for="foodprice">Price</label>
                            <input type="text" name="name" id="Price" placeholder="Price">

                            <label for="foodimage">Image</label>
                            <input type="file" name="name" id="image" placeholder="Image">

                            <label for="fooddescription">Description</label>
                            <input type="Description" name="name" id="Description" placeholder="Description">
                            <button class="foodsubmit">ADD</button>
    
                    </div>
                </div><!--close of curry dishes-->
                <div id="juicedishes">
                    <table>
                        <tr>
                            <th>Sl.No</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Action</th>

                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Lime</td>
                            <td>10</td>
                            <td><img src="lime-juice.jpg" alt="lime" width="150"></td>
                            <td>Fresh Mint lime</td>
                            <td class="dishestablebutton"><button id="edit">Edit</button><button class="delete">Delete</button></td>

                        </tr>
                    </table>
                    <div class="newfood">
                            <label for="foodname">Name</label>
                            <input type="text" name="name" id="foodname" placeholder="Food Name">

                            <label for="foodprice">Price</label>
                            <input type="text" name="name" id="Price" placeholder="Price">

                            <label for="foodimage">Image</label>
                            <input type="file" name="name" id="image" placeholder="Image">

                            <label for="fooddescription">Description</label>
                            <input type="Description" name="name" id="Description" placeholder="Description">
                            <button class="foodsubmit">ADD</button>
    
                    </div>
                </div><!--close of juice dishes-->
            </div><!--close of dishes-->
            <div class="ordermain">
                <table>
                    <tr>
                        <th>Sl.No</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Status</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Biriyani</td>
                        <td>1</td>
                        <td class="tablebutton">
                            <button id="started">Started</button>
                            <button id="packed">Packed</button>
                            <button id="finished">Finished</button>
                            <button id="canceled">Cancel</button>
                        </td>
                    </tr>
                </table>
            </div><!-- close of ordermain tag -->
        <div class="discountmain">
            <table>
                <tr>
                    <th>Sl.No</th>
                    <th>Name</th>
                    <th>Percentage</th>
                    <th>Date</th>
                    <th>Time</th>

                </tr>
                <tr>
                    <td>1</td>
                    <td>Biriyani</td>
                    <td>10%</td>
                    <td>21/12/2023</td>
                    <td>12Pm</td>
                </tr>
            </table> 
            <div class="adddiscount">
                <label for="foodname">Name</label>
                    <input type="text" id="foodname" placeholder="Enter food name"> 

                    <label for="percentage">Percentage</label>
                    <input type="number" id="percentage" placeholder="Enter Percentage">

                    <label for="date">Date</label>
                    <input type="Date" id="date" placeholder="Enter Discount till"> 

                    <label for="time">Time</label>
                    <input type="text" id="time" placeholder="Enter Time till"> 
                <button class="adddiscountbutton">Add Discount</button>
            </div>
        </div><!-- close of discount tag -->
        <div id="feedback">
            <table>
                <tr>
                    <th>SL.No</th>
                    <th>Name</th>
                    <th>Email.Id</th>
                    <th>Comment</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Athul</td>
                    <td>athulammoth789@gmail.com</td>
                    <td>I tasted the chicken biriyani its really tasty i really like the taste its just like the taste from malabar weddings.</td>
                </tr>
            </table>
        </div>
    </div><!-- close of main tag -->
</div><!-- close of container tag -->
    <script>
         $(function(){ 
            
            $("#food, #order, #discount,#feedbacksidebar").click(function(){
            $(".category,.ordermain, .discountmain,#ricedishes,#currydishes,#juicedishes,#feedback").hide();
        });

        $("#food").click(function(){
            $(".category").show();

        });

        $("#order").click(function(){
            $(".ordermain").show();
        });
    
        $("#discount").click(function(){
            $(".discountmain").show();
        });
         
         $("#viewrice").click(function(){
            $(".category").hide();
            $("#ricedishes").show();
        });
        $("#viewcurry").click(function(){
            $(".category").hide();
            $("#currydishes").show();
        })
        $("#viewjuice").click(function(){
            $(".category").hide();
            $("#juicedishes").show();
        })
        $("#feedbacksidebar").click(function(){
            $(".category").hide();
            $("#feedback").show();
        })
    })

    
    </script>
</body>
</html>
