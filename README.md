

🛒 Grocery List Organizer
📌 Project Description
The Grocery List Organizer is a simple Laravel-based web application that helps users manage their grocery items. It allows users to:

Add grocery items with categories

Mark items as bought

Edit or delete items

Filter by category or bought status

Reset or clear the entire list

The UI is responsive and clean, featuring colored category badges and visual cues for completed items.

⚙️ Setup Instructions
1. Clone the Project
bash
Copy
Edit
git clone https://github.com/yourusername/grocery-list-organizer.git
cd grocery-list-organizer
2. Install Dependencies
Make sure you have PHP (8.2+), Composer, and a database (like MySQL) installed.

bash
Copy
Edit
composer install
npm install && npm run dev
3. Environment Setup
Copy the .env.example file and configure it.

bash
Copy
Edit
cp .env.example .env
php artisan key:generate
Update database credentials in .env:

env
Copy
Edit
DB_DATABASE=grocerylist
DB_USERNAME=root
DB_PASSWORD=yourpassword
4. Run Migrations (with seeders if any)
bash
Copy
Edit
php artisan migrate
(Optional: Add sample data if seeder is provided)

bash
Copy
Edit
php artisan db:seed
5. Start the Development Server
bash
Copy
Edit
php artisan serve
Visit http://localhost:8000 to use the app.

