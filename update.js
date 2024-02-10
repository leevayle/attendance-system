const fs = require('fs');
const axios = require('axios');
const open = require('open');

// Google Drive file URL
const driveFileUrl = 'https://drive.google.com/uc?id=your_drive_file_id';

// Local file path
const localFilePath = './local-file.txt';

// Webpage URL
const webpageUrl = 'https://your-webpage-url';  

async function checkAndLoadPage() {
  try {
    // Fetch file content from Google Drive
    const driveResponse = await axios.get(driveFileUrl);
    const driveFileContent = driveResponse.data.trim();

    // Read local file content
    const localFileContent = fs.readFileSync(localFilePath, 'utf-8').trim();

    // Compare file contents
    if (driveFileContent === localFileContent) {
      console.log('Files match. Loading webpage...');
      open(webpageUrl);
    } else {
      console.log('Files do not match. Copying files...');
      await copyFilesFromDrive();
      console.log('Files copied successfully. Loading webpage...');
      open(webpageUrl);
    }
  } catch (error) {
    console.error('Error:', error.message);
  }
}

async function copyFilesFromDrive() {
  try {
    // Fetch file list from Google Drive folder
    const driveFolderUrl = 'https://www.googleapis.com/drive/v3/files?parents=your_google_drive_folder_id';
    const driveResponse = await axios.get(driveFolderUrl);
    const driveFiles = driveResponse.data.files;

    // Copy each file to the local directory
    for (const file of driveFiles) {
      const localFilePath = `./${file.name}`;
      const driveFileUrl = `https://drive.google.com/uc?id=${file.id}`;
      const driveResponse = await axios.get(driveFileUrl, { responseType: 'stream' });
      driveResponse.data.pipe(fs.createWriteStream(localFilePath));
      console.log(`Copied: ${file.name}`);
    }
  } catch (error) {
    console.error('Error copying files:', error.message);
  }
}

// Run the script
checkAndLoadPage();
