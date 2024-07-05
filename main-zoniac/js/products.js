const allItems = Array(50).fill({
  picture: `img/main_pics/image-2048x1093.jpg`,
  name: `Zonac Roof tiles`,
  price: (Math.random() * 100 + 10).toFixed(2),
})

let currentPage = 1;
const itemsPerPage = 3;
let totalPages, totalItems;

// Calculate total pages to 
const calculateTotalPages = () => {
  totalItems = allItems.length;
  totalPages = Math.ceil(totalItems / itemsPerPage);
}



// The order of the setUpPagination() should be:

// Set up all the necessary variables and event listeners.
// Call updatePagination() to set the initial state of the pagination controls.
// Call updateContent() to load the initial set of items for the first page.

// This order ensures that:

// All setup is complete before we start updating anything.
// The pagination controls are in the correct state.
// The initial content is loaded and displayed.

// It's important to call both updatePagination() and updateContent() at the end of setUpPagination() to properly initialize the page. This ensures that both the pagination controls and the content are in sync from the start.
const setUpPagination = () => {
  console.log('Setting Up pagination');

  calculateTotalPages()

  const paginationButtons = document.querySelectorAll('.pagination-button'); //This creates an array of all the dom elements with the classname. 
  const nextButton = document.getElementById('next-button');
  const prevButton = document.getElementById('prev-button');

  paginationButtons.forEach(button => {
    button.addEventListener('click', () => {
      currentPage = parseInt(button.textContent); //this new currentPage val is used to determine the items to display in the updteContent function and the button to be active
      updatePagination();
      updateContent();
    })
  });

  nextButton.addEventListener('click', () => {
    if (currentPage < totalPages) {
      currentPage++;
      updatePagination();
      updateContent();
    }
  });

  prevButton.addEventListener('click', () => {
    if (currentPage > 1) {
      currentPage--;
      updatePagination();
      updateContent();
    }
  });

  updatePagination();
  updateContent(); //Load initial content.
};


const updatePagination = () => {
  console.log(`Updating pagination. Current page: ${currentPage}, Total pages: ${totalPages}`);


  const paginationButtons = document.querySelectorAll('.pagination-button'); //variable local to function
  paginationButtons.forEach(buttons => {
    buttons.classList.remove('active');
    if (parseInt(buttons.textContent) === currentPage) {
      buttons.classList.add('active');
    };
  });

  const nextButton = document.getElementById('next-button');
  const prevButton = document.getElementById('prev-button');

  if (prevButton) {
    prevButton.disabled = currentPage === 1; // This means that when prevButton is true 'clicked' make it disabled if currentPage is exactly 1 
  }

  if (nextButton) {
    nextButton.disabled = currentPage === totalPages;
  }
}

const updateContent = () => {
  console.log(`Updating content for page ${currentPage}`);

  const startIndex = (currentPage - 1) * itemsPerPage;
  const endIndex = startIndex + itemsPerPage;
  const pageItems = allItems.slice(startIndex, endIndex);

  const contentContaianer = document.getElementById('content-container');

  contentContaianer.innerHTML = pageItems.map(item =>
    `
      <div class="col-lg-4 col-md-6">
							<div class="single-product">
								<div class="image-box">
                  <img class="img-fluid" src="${item.picture}" alt="" id="product-picture">
                </div>
								<div class="product-details">
									<h6 id="product-name">${item.name} </h6>
									<div class="price">
										<h6>$150.00</h6>
										<h6 class="l-through" id="product-price">$${item.price}</h6>
									</div>
									<div class="d-flex justify-content-between align-items-center mt-3">
                    <div class="prd-bottom d-flex">

                      <a href="javascript:void(0)" class="social-info" id="item" onclick="SelectItem()">
                        <span class="ti-bag"></span>
                        <p class="hover-text mb-0" style="margin-top:5px;">add to bag</p>
                      </a>
                      <a href="" class="social-info">
                        <span class="lnr lnr-heart"></span>
                        <p class="hover-text mb-0" style="margin-top:5px;">Wishlist</p>
                      </a>
									  </div>

				            <a class="btn circle-button btn-border btn-sm scroll-to " href="single-product.php"
                      style='display:block; color: #144381; border-color: #144381;'>
                      View more
                    </a>
                  </div>
								</div>
							</div>
						</div>
    `
  ).join('');
};

setUpPagination(); //Call Pagination function to start