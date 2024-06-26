// Item details


// Item added UI
let item = document.getElementById('item');
let itemChildOne = item.childNodes[1];
let itemChildTwo = item.getElementsByTagName("p");

console.log(itemChildOne, itemChildTwo); // Check


// Order list
let orders = document.getElementById('orders');

// Item select
let SelectItem = () => {
  itemChildOne.className = 'ti-check';
  itemChildTwo.innerHTML = 'Added';

  addItem();
}

let data = {};

const addItem = () => {
  let itemPicture = document.getElementById('product-picture');
  let itemName = document.getElementById('product-name');
  let itemPrice = document.getElementById('product-price');

  data.name = itemName;
  data.picture = itemPicture;
  data.price = itemPrice;

  creatItem();
}


const creatItem = () => {
  orders += `
    <tr >
      <td>
          <div class="media">
              <div class="d-flex">
                  ${data.picture}
              </div>
              <div class="media-body">
                  <p>${data.name}</p>
              </div>
          </div>
      </td>
      <td>
          <h5>${data.price}</h5>
      </td>
      <td>
          <div class="product_count">
              <input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:"
                  class="input-text qty">
              <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                  class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
              <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                  class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
          </div>
      </td>
      <td>
          <h5>$720.00</h5>
      </td>
    </tr>
  
  
  `
}