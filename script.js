// Selecting the sidebar and button 
const sidebar = document.querySelector(".sidebar");
const sidebarOpenBtn = document.querySelector("#sidebar-open");
const sidebarCloseBtn = document.querySelector("#sidebar-close"); // Perbaikan disini
const sidebarLockBtn = document.querySelector("#lock-icon");

// fungsi toggle gembok terkunci dan terbuka
const toggleLock = () => {
    sidebar.classList.toggle("locked");
    // agar gembok tidak terkunci
    if (!sidebar.classList.contains("locked")) {
        sidebar.classList.add("hoverable");
        sidebarLockBtn.classList.replace("bx-lock-alt", "bx-lock-open-alt");
    } else {
        sidebar.classList.remove("hoverable");
        sidebarLockBtn.classList.replace("bx-lock-open-alt", "bx-lock-alt");
    }
};

const hideSidebar = () => {
    if (sidebar.classList.contains("hoverable")) {
        sidebar.classList.add("close");
    }
};
const showSidebar = () => {
    if (sidebar.classList.contains("hoverable")) {
        sidebar.classList.remove("close");
    }
};

//sasa
const toggleSidebar = () => {
    sidebar.classList.toggle("close");
};

//sadasd
if (window.innerWidth < 800) {
    sidebar.classList.add("close");
    sidebar.classList.remove("locked");
    sidebar.classList.remove("hoverable");
}

// adding event listeners to buttons and sidebar for the corresponding actions
sidebarLockBtn.addEventListener("click", toggleLock);
sidebar.addEventListener("mouseleave", hideSidebar);
sidebar.addEventListener("mouseenter", showSidebar);
sidebarOpenBtn.addEventListener("click", toggleSidebar);
sidebarCloseBtn.addEventListener("click", toggleSidebar);


// Menu search
document.addEventListener('mouseleave', function(event) {
    const containerHasil = document.getElementById('search-results');

    // Check if the clicked element is not part of the pop-up or search input
    if (!containerHasil.contains(event.target) && event.target.className !== 'search_box') {
        containerHasil.style.display = 'none';
    }
});

// Add event listener to detect focus on the search element
const searchBox = document.querySelector('.search_box');
searchBox.addEventListener('click', function(event) {
    event.stopPropagation(); // Stop propagation to the mouseleave event outside the search box
});

// Event listener to detect clicks outside the search element
document.addEventListener('click', function(event) {
    const containerHasil = document.getElementById('search-results');

    // Check if the clicked element is not part of the pop-up or search input
    if (!containerHasil.contains(event.target) && event.target.className !== 'search_box') {
        containerHasil.style.display = 'none';
    }
});

// Product data
const produk = [
    { nama: "Mobile Legend", foto: "foto/chou.png", url: "ml.php" },
    { nama: "Free Fire", foto: "foto/ff.jpg", url: "ff.php"},
    { nama: "Pubg Battlegrounds", foto: "foto/pubg.jpg", url: "pubg.php" },
    { nama: "Valorant", foto: "foto/valo.jpg", url:"valorant.php" },
    { nama: "8 Ball Pool", foto: "foto/8bp.jpg", url: "8bp.php" },
    { nama: "Genshin Impact", foto: "foto/gensin.jpg", url: "gensin.php" }
];

// Search function
function cariProduk(query) {
    console.log('Query:', query);
    const filteredProduk = produk.filter(product => product.nama.toLowerCase().includes(query.toLowerCase()));
    displayResults(filteredProduk);
}

// Handle product click
function handleProductClick(url) {
    console.log('Navigasi ke URL:', url);
    if (url) {
        window.location.href = url;
    }
}


// Display search results
// Display search results
function displayResults(results) {
    const searchResultsElement = document.getElementById('search-results');
    searchResultsElement.innerHTML = '';

    if (results.length > 0) {
        searchResultsElement.style.display = 'block';

        const productList = document.createElement('ul');
        productList.classList.add('product-list');
        
        // Menambahkan properti CSS untuk menghilangkan bullet point
        productList.style.listStyleType = 'none';
        productList.style.padding = '0';
        productList.style.margin = '0';

        results.forEach(product => {
            const listItem = document.createElement('li');
            listItem.classList.add('product-item');
        
            const productImage = document.createElement('img');
            productImage.src = product.foto;
            productImage.alt = product.nama;
        
            const productDetails = document.createElement('div');
            productDetails.classList.add('product-details');
        
            const productName = document.createElement('p');
            productName.textContent = product.nama;
        
            // Menambahkan properti CSS untuk menggunakan Flexbox
            productDetails.style.display = 'flex';
            productDetails.style.alignItems = 'center';
        
            // Menambahkan teks ke dalam elemen productDetails
            productDetails.appendChild(productName);
        
            // Menambahkan gambar ke dalam elemen productDetails
            productDetails.appendChild(productImage);
        
            listItem.appendChild(productDetails);
        
            listItem.addEventListener('click', () => handleProductClick(product.url));
        
            productList.appendChild(listItem);
        });
        
        searchResultsElement.appendChild(productList);
    } else {
        searchResultsElement.style.display = 'none';
        const noResultsMessage = document.createElement('p');
        noResultsMessage.textContent = 'Tidak ada hasil ditemukan.';
        searchResultsElement.appendChild(noResultsMessage);
    }
}


document.querySelector('.login-navbar').addEventListener('click', function(event) {
    event.preventDefault(); // Mencegah perilaku default

    // Tambahkan kode navigasi ke "login.php" di sini
    window.location.href = 'login.php';
});
