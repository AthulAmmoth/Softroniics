<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
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
            height: 100vh;
            background-color: #333;
            color: #fff;
            padding: 20px;
            min-width: 200px;
        }

        .item {
            padding: 10px;
            cursor: pointer;
            border-bottom: 1px solid #555;
            transition: background-color 0.3s;
        }

        #main {
            flex-grow: 1;
            padding: 20px;
        }

        #mainOrder, #mainFavourites, #mainFeedback,#mainDiscount,#riceDishes,#curryDishes,#juiceDishes {
            display: none;
            padding: 20px;
        }

        #textFeedback {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
            resize: vertical;
            min-height: 275px;
        }

        #feedbackSubmit {
            padding: 10px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            margin-left: auto;
            margin-top: 15px;
            display: block;
            transition: background-color 0.3s;
        }

        #feedbackSubmit:hover {
            background-color: #3d0505;

        }

        #mainFavourites {
            background-color: #f9f9f9;
            padding: 20px;
            margin-top: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            height:100%;
        }

        .foodFavourites {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .foodFavourites > div {
            width: calc(33.33% - 127px);
            background-color: #fff;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            position: relative;
            transition: transform 0.3s;
        }

        .foodFavouritesItem:hover {
            transform: scale(1.02);
        }
        
        .foodFavourites img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 5px;
            margin-top: 10px;
        }

        #mainDiscount {
            background-color: #f9f9f9;
            padding: 20px;
            margin-top: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            height:100%;
        }

        .discountItem {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            width: calc(33.33% - 127px);
            background-color: #fff;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            position: relative;
            transition: transform 0.3s;
        }

        .discountItem:hover {
            transform: scale(1.02);
        }

        .discountItem img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 5px;
            margin-top: 10px;
        }

        svg {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 1.5em;
            color: red;
            cursor: pointer;
            transition: color 0.3s;
        }

        h4 {
            margin-top: 10px;
            font-size: 1.2em;
        }

        p {
            margin: 10px 0;
            font-size: 0.9em;
            flex: -moz-available;
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
        #cancel{
            background-color: red;
        }

        .discountBadge {
            position: absolute;
            height: 23px;
            padding-left: 5px;
            border-radius: 3px;
            color: #fff !important;
            font-size: 12px;
            font-weight: 400;
            letter-spacing: .025em;
            line-height: 24px;
            white-space: nowrap;
            top: 10px;
            right: 10px;
            background-color: #21bd4a !important;
            width: 43px;
            padding-right: 15px;
        }


    </style>
</head>
<body>
    <div id="container">
        <div id="sidebar">
            <div class="item" id="sidebarMenu">Menu</div>
            <div class="item" id="sidebarDiscount">Discount</div>
            <div class="item" id="sidebarOrder">Your Order</div>
            <div class="item" id="sidebarFavourites">Favourites</div>
            <div class="item" id="sidebarFeedback">Feedback</div>
        </div>
        <div id="main">
            <div id="mainMenu">
                <div id="category">
                    <div class="categoryItem" id="rice">
                        <h4>Rice</h4>
                        <img src="Biriyani.jpg" alt="Biriyani">
                        <p id="pRice">This is the category which contains all the rice items including Biriyani, Kuzhimandi, etc...</p>                   
                            <button class="categoryButton" id="viewRice">View</button>
                    </div>
                    <div class="categoryItem" id="curry">
                        <h4>Curry</h4>
                        <img src="Chicken-Curry-recipe-750x750.jpg" alt="Chicken Curry">
                        <p id="pCurry" >This is the category which contains all the curry items including Paneer, chicken...</p>
                            <button id="viewCurry" class="categoryButton">View</button>
                    </div>
                    <div class="categoryItem" id="juice">
                        <h4>Juice</h4>
                        <img src="lime-juice.jpg" alt="Lime Juice">
                        <p id="pJuice">This is the category which contains all the juice items including tea, coffee, lime, etc...</p>
                            <button id="viewJuice" class="categoryButton">View</button>
                    </div>
            </div><!-- close of category tag -->
            <div id="dishes">
                <div id="riceDishes">
                    <table id="riceDishesTable">
                        <tr>
                            <th>Sl.No</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Chicken Biriyani</td>
                            <td>100</td>
                            <td></td>
                            <td class="dishesTableButton"><button class="buy">Buy</button></td>
                        </tr>
                    </table>
                </div><!--close of rice dishes-->
                <div id="curryDishes">
                    <table id="curryDishesTable">
                        <tr>
                            <th>Sl.No</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Chicken Curry</td>
                            <td>50</td>
                            <td></td>
                            <td class="dishesTableButton"><button class="buy">Buy</button></td>

                        </tr>
                    </table>
                </div><!--close of curry dishes-->
                <div id="juiceDishes">
                    <table id="juiceDishesTable">
                        <tr>
                            <th>Sl.No</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Action</th>

                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Lime</td>
                            <td>10</td>
                            <td></td>
                            <td class="dishesTableButton"><button class="delete">Delete</button></td>
                        </tr>
                    </table>
                </div><!--close of juice dishes-->
            </div><!--close of dishes-->
            </div><!--close of main menu-->
            <div id="mainDiscount">
                <div class="discountItem" id="discountChickenBiriyani">
                    <div class="discountBadge">10% OFF</div>
                    <h4>Chicken Biriyani</h4>
                    <img src="Biriyani.jpg" alt="Biriyani">
                    <p id="foodFavouritePrice"><b>90</b></p>
                    <p id="foodFavouriteDescription">Spicy special thalaserry biriyani</p>
                </div>
        </div><!-- close of food favourites --> 
            <div id="mainOrder">
                <table>
                    <tr>
                        <th>Sl.No</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Chicken Biriyani</td>
                        <td>1</td>
                        <td>100</td>
                        <td><button id="cancel">Cancel</button></td>

                    </tr>

                </table>
            </div>
            <div id="mainFavourites">
                <div class="foodFavourites">
                    <div class="foodFavouritesItem" id="foodFavouritesChickenBiriyani">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                        </svg>
                        <h4>Chicken Biriyani</h4>
                        <img src="Biriyani.jpg" alt="Biriyani">
                        <p id="foodFavouritePrice"><b>100</b></p>
                        <p id="foodFavouriteDescription">Spicy special thalaserry biriyani</p>
                    </div>
                    <div class="foodFavouritesItem" id="foodFavouritesChickenCurry">
                        <svg id="favouriteIcon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                        </svg>
                        <h4>Chicken curry</h4>
                        <img src="Chicken-Curry-recipe-750x750.jpg" alt="Chicken Curry">
                        <p id="foodFavouritePrice"><b>50</b></p>
                        <p id="foodFavouriteDescription">Tasty kerala chicken curry</p>
                    </div>
                    <div class="foodFavouritesItem" id="foodFavouritesLime">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                        </svg>
                        <h4>Lime</h4>
                        <img src="lime-juice.jpg" alt="Biriyani">
                        <p id="foodFavouritePrice"><b>10</b></p>
                        <p id="foodFavouriteDescription">Fresh Mint lime</p>
                    </div>
                </div><!-- close of food favourites -->
            </div><!--close of main favourite tag-->
            <div id="mainFeedback">
                <textarea id="textFeedback" placeholder="Enter your feedback"></textarea>
                <button id="feedbackSubmit">Submit</button>
            </div>
        </div><!--close of main tag-->
    </div><!-- close of container tag -->

 <script>
        $(function () {

            $("#sidebarMenu, #sidebarOrder, #sidebarFeedback, #sidebarFavourites,#sidebarDiscount,#viewRice,#viewCurry,#viewJuice").click(function () {
                $("#MainMenu, #mainOrder, #mainFeedback, #mainFavourites,#mainDiscount,#category,#riceDishes,#curryDishes,#juiceDishes").hide();
            });

            $("#sidebarMenu").click(function () {
                $("#category").show();
            });

            $("#sidebarDiscount").click(function () {
                $("#mainDiscount").show();
            });

            $("#sidebarOrder").click(function () {
                $("#mainOrder").show();
            });

            $("#sidebarFavourites").click(function () {
                $("#mainFavourites").show();
            });

            $("#sidebarFeedback").click(function () {
                $("#mainFeedback").show();
            });

            $("#viewRice").click(function(){
                $("#category").hide();
                $("#riceDishes").show();
            });

            $("#viewCurry").click(function(){
                $("#category").hide();
                $("#curryDishes").show();
            })

            $("#viewJuice").click(function(){
                $("#category").hide();
                $("#juiceDishes").show();
            })

            })
        </script>
    </body>
</html>