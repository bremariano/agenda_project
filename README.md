# agenda_project
1. Requirements
   Functional:

Allow listing of registered contacts.

Allow creating new contact (name, phone, observations).

Allow editing existing contacts.

Allow deleting contacts.

Display success messages after operations.

Basic navigation between pages (list, create, edit, view).

Non-functional:

Use PHP with PDO for MySQL database interaction.

Simple responsive interface with Bootstrap.

Store data in MySQL database.

Basic security (prevent SQL injection with prepared statements).

User-friendly messages.

2. Scope
   The system serves users who need to organize simple personal or professional contacts, enabling basic create, read, update, and delete operations. It does not include authentication, advanced filters, or external integrations.

3. System Description
   The system has a simple web interface displaying a list of contacts and allows adding, editing, or deleting contacts. Each contact contains a name, phone number, and observations field.

Technologies used:

PHP 8.x

MySQL

Bootstrap 5 for styling

FontAwesome for icons

4. Data Modeling
   Database Table: contacts

Field	Type	Details
id	INT (PK)	Auto-increment
name	VARCHAR(255)	Contact name
phone	VARCHAR(20)	Phone number
observations	TEXT	Additional notes

Main Files:

index.php — lists contacts

create.php — form to create contact

edit.php — form to edit contact

show.php — shows contact details

config/process.php — handles POST requests for create, edit, delete

config/connection.php — database connection

templates/header.php, templates/footer.php — common layout files

5. Implementation
   Basic Flow:

User accesses index.php and views the contact list.

Clicks to create a contact (create.php) — submits form to process.php with type=create.

Clicks to edit a contact (edit.php?id=xx) — form populated with data, submits to process.php with type=edit.

Clicks to delete a contact — submits a POST form to process.php with type=delete.

After any operation, user is redirected back to index.php with a success message.

Security:

Uses prepared statements to prevent SQL injection.

Basic HTML5 validation (required fields).

Sessions used for flash messages.