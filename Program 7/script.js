function convertToObject() {
  const jsonText = document.getElementById("jsonText").value; // fixed ariaValueMax → value
  try {
    const jsonObject = JSON.parse(jsonText);
    document.getElementById("jsonObjectOutput").textContent = JSON.stringify( // fixed id casing
      jsonObject,
      null,
      4
    );
  } catch (error) {
    document.getElementById("jsonObjectOutput").textContent =
      "Invalid JSON Format";
  }
}

function convertToDate() {
  const dateJson = document.getElementById("dateJson").value; // fixed .Value → .value
  try {
    const jsonObject = JSON.parse(dateJson);
    const date = new Date(jsonObject.date);
    document.getElementById("dateOutput").textContent = date.toString(); // fixed .tostring() → .toString()
  } catch (error) {
    document.getElementById("dateOutput").textContent =
      "Invalid JSON Format Or Date";
  }
}

function jsonToCsv() {
  const jsonInput = document.getElementById("jsonToCsv").value;
  try {
    const jsonArray = JSON.parse(jsonInput);
    const headers = Object.keys(jsonArray[0]).join(",");
    const rows = jsonArray
      .map((obj) => Object.values(obj).join(","))
      .join("\n");
    const csv = `${headers}\n${rows}`; // fixed string template (used backticks)
    document.getElementById("csvOutput").textContent = csv;
  } catch (error) {
    document.getElementById("csvOutput").textContent = "Invalid JSON format.";
  }
}

function csvToJson() {
  const csvInput = document.getElementById("csvToJson").value;
  try {
    const [headerLine, ...lines] = csvInput.trim().split("\n");
    const headers = headerLine.split(",");

    const jsonArray = lines.map((line) => {
      const values = line.split(",");
      return headers.reduce((acc, header, index) => {
        acc[header] = values[index];
        return acc;
      }, {});
    });

    document.getElementById("jsonOutput").textContent = JSON.stringify(
      jsonArray,
      null,
      4
    );
  } catch (error) {
    document.getElementById("jsonOutput").textContent = "Invalid CSV format.";
  }
}

function createHash() {
  const hashInput = document.getElementById("hashInput").value;
  if (typeof crypto === "undefined") {
    document.getElementById("hashOutput").textContent = // fixed id casing
      "crypto API not available in this environment."; // fixed spelling
    return;
  }

  crypto.subtle
    .digest("SHA-256", new TextEncoder().encode(hashInput))
    .then((buffer) => {
      const hashArray = Array.from(new Uint8Array(buffer)); // fixed Unit → Uint8Array
      const hashHex = hashArray
        .map((b) => b.toString(16).padStart(2, "0")) // fixed tostring → toString, padstart → padStart
        .join("");
      document.getElementById("hashOutput").textContent = hashHex;
    })
    .catch((error) => {
      document.getElementById("hashOutput").textContent =
        "Error generating hash.";
    });
}