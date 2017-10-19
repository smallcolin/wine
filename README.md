# Wine(e-commerce)

Final project for the PHP, databases & Versioncontrol course.<br />
Made with the php framework Laravel (in just under 7 days).

## 
The project.
The concept behind this was to build a basic but feature filled e-commerce application.
It has two main areas, Customer & Admin.<br />

Every customer should have the ability to 
  1. Register & login to their account
  2. browse and upload new images to the gallery
  3. Create a new wine 
  4. Leave comments on each item's page (and edit them)
  5. Browse through previous orders
  6. Be able to add items (wine) to the shopping cart, then purchase
  
Admin has the abiltity to:-
  1.  Create and edit a new country category
  2.  Browse, edit/delete all the wines
  3.  Browse, edit/delete all customers
  4.  Browse, edit/delete all comments
  5.  Browse and edit all the orders
  6.  Browse, edit/delete all images from the gallery
  7.  Export out a csv file containing all data from each separate table from the database

*All creating/editing features are only available when a user or admin is logged in.


####
Instructions
1. git clone
2. composer install
3. Edit .env file (eg. append database name, user & password)
4. php artisan key:generate
5. php artisan migrate
6. php artisan db::seed
