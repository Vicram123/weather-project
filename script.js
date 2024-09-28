// Function to format the date
const formatDate = (entry) => {
  const day = entry.Pv.toString().padStart(2, "0");
  const month = entry.Kk.toString().padStart(2, "0");
  const year = entry.Vuosi;
  return `${day}.${month}.${year}`;
};

// Generate the table head
const generateTableHead = (data) => {
  const tableHead = document.querySelector("#weatherTable thead");
  tableHead.innerHTML = ""; // Clear any existing header

  const row = tableHead.insertRow();
  const emptyCell = row.insertCell(); // Empty cell in the top-left corner
  emptyCell.textContent = "";

  // Generate date headers across the top
  data.slice(0, 8).forEach((entry) => {
    const dateCell = row.insertCell();
    dateCell.textContent = formatDate(entry);
  });
};

// Show weather details in a vertical layout
const showEightDays = (data) => {
  const tableBody = document.querySelector("#weatherTable tbody");
  tableBody.innerHTML = ""; // Clear any existing rows

  // List of weather parameters with colored icons
  const parameters = [
    {
      label: "Sademäärä (mm)",
      icon: '<i class="fas fa-cloud-rain" style="color: #1E90FF;"></i>',
      key: "Sademäärä (mm)",
    },
    {
      label: "Lumensyvyys (cm)",
      icon: '<i class="fas fa-snowflake" style="color: #ADD8E6;"></i>',
      key: "Lumensyvyys (cm)",
    },
    {
      label: "Ylin lämpötila (degC)",
      icon: '<i class="fas fa-temperature-high" style="color: #FF4500;"></i>',
      key: "Ylin lämpötila (degC)",
    },
    {
      label: "Alin lämpötila (degC)",
      icon: '<i class="fas fa-temperature-low" style="color: #1E90FF;"></i>',
      key: "Alin lämpötila (degC)",
    },
  ];

  parameters.forEach((param) => {
    const row = tableBody.insertRow();

    // Create a cell for the parameter label with an icon
    const labelCell = row.insertCell();
    labelCell.innerHTML = `${param.icon} ${param.label}`;

    // Create cells for the corresponding values for each date
    data.slice(0, 8).forEach((entry) => {
      const cell = row.insertCell();
      cell.textContent = entry[param.key];
    });
  });
};

// Fetch the weather data
fetch("./weatherdata.json")
  .then((response) => response.json())
  .then((data) => {
    generateTableHead(data);
    showEightDays(data);
  })
  .catch((error) => {
    console.error("There was a problem with the fetch operation:", error);
  });

// navbar
$("#search-icon").click(function () {
  $(".nav").toggleClass("search");
  $(".nav").toggleClass("no-search");
  $(".search-input").toggleClass("search-active");
});

$(".menu-toggle").click(function () {
  $(".nav").toggleClass("mobile-nav");
  $(this).toggleClass("is-active");
});
