# AgenceTaxis - Driver Company Dashboard

A simple PHP-based web application for managing a taxi agency's vehicles, drivers, and their associations. This dashboard allows CRUD operations on vehicles and drivers, as well as managing assignments between them.

## Features

- **Vehicles Management**: Add, list, edit, and delete vehicles (including marque, modèle, couleur, immatriculation).
- **Drivers Management**: Add, list, edit, and delete drivers (nom, prénom).
- **Associations**: Create, list, edit, and delete associations between vehicles and drivers.
- **Dashboard Overview**: Summary statistics on total vehicles, drivers, unused vehicles, and unused drivers.
- **Responsive UI**: Built with Pico CSS for a clean, minimal interface.

## Technologies Used

- **Backend**: PHP 7+ with PDO for database interactions.
- **Database**: MySQL (schema provided in `taxis.sql`).
- **Frontend**: HTML, CSS (Pico CSS framework), JavaScript for confirmations.
- **Server**: Compatible with WAMP/XAMPP for local development.

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/OliRati/AgenceTaxis.git
   cd AgenceTaxis
   ```
2. Import the database schema:
   - Open `phpMyAdmin` or any MySQL client.
   - Import the `taxis.sql` file to create the necessary tables.
3. Configure the database connection:
   - Edit `connexiondb.php` to set your database credentials.
4. Access the application:
   - Start WAMP/XAMPP and ensure the Apache and MySQL services are running.
   - Navigate to `http://localhost/AgenceTaxis` in your web browser.


## File Structure
```
AgenceTaxis/
├── index.php                         # Main dashboard with statistics
├── connexiondb.php                   # Database connection
├── fonctions.php                     # Utility functions and database operations
├── taxis.sql                         # Database schema
├── assets/
│   └── css/
│       ├── pico.min.css              # Pico CSS framework
│       └── style.css                 # Custom styles
├── association/                      # Association management
│   ├── add-association.php
│   ├── del-association.php
│   ├── edit-association.php
│   └── list-association.php
├── driver/                           # Driver management
│   ├── add-driver.php
│   ├── del-driver.php
│   ├── edit-driver.php
│   └── list-driver.php
├── vehicule/                         # Vehicle management
│   ├── add-vehicule.php
│   ├── del-vehicule.php
│   ├── edit-vehicule.php
│   └── list-vehicule.php
└── views/                            # HTML views
    ├── association/
    │   └── list-association-view.php
    ├── driver/
    │   ├── add-driver-view.php
    │   ├── driver-view.php
    │   └── list-driver-view.php
    ├── footer/
    │   └── footer.php                # Common Footer
    ├── nav/
    │   └── nav.php                   # Common Navigation bar
    └── vehicule/
        ├── add-vehicule-view.php
        ├── list-vehicule-view.php
        └── vehicule-view.php
```

## Usage

- **Dashboard**: View overall statistics and quick links to manage vehicles and drivers.
- **Vehicles**: Manage taxi vehicles, including adding new ones and editing or removing existing entries.
- **Drivers**: Manage drivers associated with the taxi agency, with options to add, edit, or delete driver information.
- **Assignments**: Link vehicles with drivers, including managing and removing these associations.

## Contributing

Contributions are welcome! Please follow these steps:

1. Fork the repository.
2. Create a new branch for your feature or bug fix.
3. Commit your changes.
4. Push to your forked repository.
5. Submit a pull request detailing your changes.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---

**Note**: This project is a simplified demonstration for educational purposes, showcasing basic CRUD operations and PHP/MySQL integration.
