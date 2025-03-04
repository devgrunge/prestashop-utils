# How to Install the modules on this repo

This documentation provides step-by-step instructions for installing PrestaShop modules. These modules can extend the functionality of your PrestaShop store, offering additional features and integrations.

---

## Table of Contents

- [Pre-requisites](#pre-requisites)
- [Installation Methods](#installation-methods)
  - [1. Uploading Through Back Office](#1-uploading-through-back-office)
  - [2. Manually Uploading via FTP](#2-manually-uploading-via-ftp)
- [Troubleshooting](#troubleshooting)

---

## Pre-requisites

Before you begin, ensure the following:

1. You have access to your PrestaShop Back Office.
2. Your module is compatible with your PrestaShop version.
3. The module is downloaded as a `.zip` file.
4. You have FTP access (for manual installations).

---

## Installation Methods

### 1. Uploading Through Back Office

1. **Log in to the Back Office**  
   Access your PrestaShop admin panel by logging in with your credentials.

2. **Navigate to the Modules Section**  
   - Go to `Modules > Module Manager` in the left-hand menu.

3. **Add a New Module**  
   - Click the **Upload a Module** button (usually in the top-right corner).
   - Drag and drop your `.zip` file or select it from your computer.

4. **Install the Module**  
   - Once uploaded, the module will appear in the module list.
   - Click the **Install** button next to the module.

5. **Configure the Module (if necessary)**  
   - After installation, some modules require configuration. Click **Configure** and follow the on-screen instructions.
---

### 2. Manually Uploading via FTP

1. **Extract the Module Files**  
   - Extract the `.zip` file on your computer.

2. **Access Your Server via FTP**  
   - Use an FTP client (e.g., FileZilla) to connect to your server.

3. **Upload the Module**  
   - Navigate to the `modules` folder in your PrestaShop installation directory.
   - Upload the extracted module folder into the `modules` directory.

4. **Log in to the Back Office**  
   - Go to `Modules > Module Manager`.

5. **Install the Module**  
   - Locate the uploaded module in the list and click **Install**.

6. **Configure the Module (if necessary)**  
   - After installation, click **Configure** if the module requires additional setup.

---

## Troubleshooting

- **Module Not Displayed in List**  
  - Clear the cache (`Advanced Parameters > Performance > Clear Cache`) and refresh the module manager.

- **Installation Errors**  
  - Ensure the module is compatible with your PrestaShop version.
  - Check folder permissions (set `modules` folder permissions to 755 or 775 if needed).

- **Module Not Working After Installation**  
  - Check the module’s documentation for dependencies.
  - Review error logs (`Advanced Parameters > Logs`).
