<?php
    session_start();
    $sShowWelcome = "";
    $sShowLogin = "";
    $sShowPage = "";
    if( isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] )
    {
        // show the welcome page
        $sShowPage = "showPage";
        $sShowImage = $_SESSION['userImage'];
        $sShowLastName = $_SESSION['userLastName'];
        $sShowUserRole = $_SESSION['userRole'];
        //echo "yes";
    }
    else
    {
        // show the login page
        $sShowPage = "";
        //echo "NO";
        $sShowLogin = "showPage";
    }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
  </head>
  <link rel="stylesheet" href="styles/style.css">
  <body>
    <!-- /* * * * * Frontpage of Webshop: what you see when logged out * * * * */ -->
    <div class="page <?php echo $sShowLogin; ?>" id="pageLoggedOutStore">
      <header>
        <h1 id="btnBackToStore" style="color: black;">MY WEBSHOP   - -- -- - - -- - - --- - </h1>
        <button id="btnGoToCart" class="btnCart" type="button"><img class="btnToCart" src="images/icon_red2.svg" alt=""></button>
        <button class="btnShowPage btnToLogin" data-showThisPage="pageLoggedOut" type="button" name="button">LOGIN</button>
      </header>
      <div class="shopSubscribe" id="shopSubscribe">
        <p>Subscribe to newsletter ---> </p>
        <form id="frmUserEmail" class="frmUserEmail" method="post">
          <input type="text" name="txtUserEmail" value="" placeholder="Your email here">
        </form>
        <button class="btnSubscribeEmail" id="btnSubscribeEmail" type="button" name="button">SUBSCRIBE</button>
      </div>
      <div class="shopLocation" id="shopLocation">
        <p>Where are we located ---> </p>
        <button id="seeShopLocation" class="shopLocation" type="button" name="button">?</button>
      </div>
      <div class="shopCart" id="shopCart">
        <div class="showMyCart" id="showMyCart"></div>
        <div class="clearBuyButtons">
          <button id="btnClearCart" class="btnClearCart" type="button" name="button">Clear Cart</button>
          <button id="btnBuyInCart" class="btnBuyInCart" type="button" name="button">Buy Now!</button>
        </div>
      </div>
      <div class="shopContent" id="shopContent">
      </div>
      <div class="mapModal" id="mapModal">
        <div class="mapInfo">
          <h1>Come visit our Copenhagen Stores!</h1>
          <button id="btnCloseMapModal" class="btnCloseMapModal" type="button" name="button">X</button>
        </div>
        <div id="map"></div>
      </div>
    </div>

    <!-- /* * * * * Webshop Login * * * * */ -->
    <div class="page" id="pageLoggedOut">
      <div class="pageLogIn">
        <div class="form-style-6">
          <form id="frmLogin">
            <button id="btnCloseSignUp" class="btnCloseSignUp btnShowPage" data-showThisPage="pageLoggedOutStore" type="button">X</button>
            <input type="text" name="txtUserEmailLogin" placeholder="email" autocomplete="off">
      			<input type="text" name="txtUserPasswordLogin" placeholder="password" autocomplete="off">
      			<button class="btnLogin" id="btnLogin" type="button">LOGIN</button>
            <h4>OR</h4>
            <button class="btnSignUp btnShowPage" id="btnSignUp" data-showThisPage="pageLoggedOutSubmit" type="button">Sign Up</button>
      		</form>
        </div>
      </div>
    </div>

    <!-- /* * * * * Webshop Login Submit Form * * * * */ -->
    <div class="page" id="pageLoggedOutSubmit">
      <div class="pageLogIn">
        <div class="form-style-6 frmSumbit">
          <form id="frmUser">
            <button class="btnCloseSignUp btnShowPage" data-showThisPage="pageLoggedOut" type="button">X</button>
            <input type="text" name="txtUserFirstName" placeholder="first name" required>
      			<input type="text" name="txtUserLastName" placeholder="last name" required>
            <input type="text" name="txtUserEmail" placeholder="email" required>
            <input type="text" name="txtUserPassword" placeholder="password" required autocomplete="off">
            <input type="text" name="txtUserMobile" placeholder="mobile" required autocomplete="off">
            <input type="file" name="fileUserPic">
            <button class="btnSubmit" id="btnSubmit" type="button">SUBMIT</button>
      		</form>
        </div>
      </div>
    </div>

    <!-- /* * * * * Webshop Login Error message * * * * */ -->
		<div id="pageLogError">
			Something whent wrong, please try again
		</div>

    <!-- /* * * * * Frontpage of Webshop: what you see when logged out * * * * */ -->
    <div class="pageLoggedIn <?php echo $sShowPage; ?>" id="pageLoggedIn">

      <div class="profileImage" id="profileImage">
        <h3>Welcome <?php echo $sShowLastName; ?></h3>
        <img src="<?php echo $sShowImage; ?>" alt="">
      </div>

      <ul id="menuMain">
        <li class="btnShowPage" data-showThisPage="pageMyProfile" id="menuShowMyProfile">My Profile</li>
        <?php if($sShowUserRole == 'admin'): ?>
        <li class="btnShowPage" data-showThisPage="divShowAllUsers" id="menuShowAllUsers">All Users</li>
      <?php endif; ?>
        <li class="btnShowPage" data-showThisPage="divShowAllProducts" id="menuShowAllProducts">Products</li>
        <li class="btnShowPage" data-showThisPage="pageLoggedOut" id="menuLogOut">Log Out</li>
      </ul>

      <div id="divAddProduct">
        <button class="btnAddProduct" id="btnAddProduct" type="button">ADD PRODUCT</button>
      </div>

      <div class="landingPage flex-grid-thirds" id="divAllProducts"></div>

      <div class="page" id="pageMyProfile"></div>

      <div class="page flex-grid-thirds" id="divShowAllUsers"></div>

      <div class="page flex-grid-thirds" id="divShowAllProducts"></div>

      <div class="addProducts" id="addProducts">
        <div class="form-style-6 divAddProducts">
          <form id="frmAddProduct">
            <button class="btnCloseAddProduct" id="btnCloseAddProduct" type="button">X</button>
            <input type="text" name="txtProductName" placeholder="Product name" required>
            <input type="number" name="txtProductPrice" placeholder="Product Price" required>
            <input type="file" name="fileProductPic">
            <button class="btnSaveProduct" id="btnSaveProduct" type="button">Save Product</button>
          </form>
        </div>
      </div>

      <div class="page" id="pageEditUser">
        <div class="pageLogIn">
          <div class="form-style-6 frmSumbit">
            <form id="frmEditUser">
              <button class="btnCloseSignUp btnShowPage" data-showThisPage="divShowAllUsers" type="button">X</button>
              <input id="txtEditUserFirstName" type="text" name="txtEditUserFirstName" placeholder="first name" required>
              <input id="txtEditUserLastName" type="text" name="txtEditUserLastName" placeholder="last name" required>
              <input id="txtEditUserEmail" type="text" name="txtEditUserEmail" placeholder="email" required>
              <input id="txtEditUserPassword" type="text" name="txtEditUserPassword" placeholder="password" required autocomplete="off">
              <input id="txtEditUserMobile" type="text" name="txtEditUserMobile" placeholder="mobile" required autocomplete="off">
              <input id="fileEditUserPic" type="file" name="fileEditUserPic">
              <input id="txtEditUserId" type="hidden" name="txtEditUserId" value="">
              <button class="btnSubmit btnSubmitEdit" id="btnSubmitEdit" type="button">SAVE</button>
            </form>
          </div>
        </div>
      </div>

      <div class="editProduct" id="editProduct">
        <div class="form-style-6 divAddProducts">
          <form id="frmEditProduct">
            <button class="btnCloseAddProduct" id="btnCloseEditProduct" type="button">X</button>
            <input id="txtEditProductName" type="text" name="txtEditProductName" placeholder="Product name" required>
            <input id="txtEditProductPrice" type="number" name="txtEditProductPrice" placeholder="Product Price" required>
            <input id="fileEditProductPic" type="file" name="fileEditProductPic">
            <input id="txtEditProductId" type="hidden" name="txtEditProductId" value="">
            <button class="btnSaveProduct btnSaveEditedProduct" id="btnSaveEditedProduct" type="button">Save Product</button>
          </form>
        </div>
      </div>

    </div>

  	<script>

      var loggedInUser = <?php echo json_encode($_SESSION['userId']); ?>

      // LISTENS AFTER CLICK ON PAGE
      document.addEventListener("click", function(e) {

        //when btnDeleteUser is targeted
        if (e.target.classList.contains("btnDeleteUser")) {
          var UserId = e.target.getAttribute("data-id");
          //console.log(UserId);
          var ajax = new XMLHttpRequest();
          ajax.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              var sDataFromServer = this.responseText;
            }
          }
          ajax.open("GET", "api/api-delete-user.php?id="+UserId, true);
          ajax.send();
        }

        //Change beetween pages!
        else if (e.target.classList.contains("btnShowPage")){
          var sDataAttibute = e.target.getAttribute("data-showThisPage");
          var aShowPage = document.querySelectorAll(".page");
          for (var i = 0; i < aShowPage.length; i++) {
            aShowPage[i].classList.remove("showPage");
          }
          var pageID  = document.querySelector('#'+sDataAttibute);
          pageID.classList.add("showPage");
        }

        //when btnEditUser is targeted
        if (e.target.classList.contains("btnEditUser")){
          var UserId = e.target.getAttribute("data-id");
          var ajax = new XMLHttpRequest();
          ajax.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              var sDataFromServer = this.responseText;
              var jDataFromServer = JSON.parse(sDataFromServer);
                //inserting value from data in to inputs
                txtEditUserFirstName.value = jDataFromServer.firstname;
                txtEditUserLastName.value = jDataFromServer.lastname;
                txtEditUserEmail.value = jDataFromServer.email;
                txtEditUserPassword.value = jDataFromServer.password;
                txtEditUserMobile.value = jDataFromServer.mobile;
                txtEditUserId.value = jDataFromServer.id;
            }
          }
          ajax.open("GET", "api/api-get-user.php?id="+UserId, true);
          ajax.send();
        }

        //Submiting new information
        if (e.target.classList.contains("btnSubmitEdit")){
          //console.log('x');
          var ajax = new XMLHttpRequest();
          ajax.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              var sDataFromServer = this.responseText;
              var jDataFromServer = JSON.parse(sDataFromServer);
              //console.log(jDataFromServer);
            }
          }
          ajax.open("POST", "api/api-update-user.php", true);
          var jFrmEditUser = new FormData( frmEditUser );
          //jFrmEditUser.append('id');
          ajax.send(jFrmEditUser);
          window.location.replace("index.php");
        }

        //DELETE PRODUCTS!
        if (e.target.classList.contains("btnDeleteProduct")) {
          var ProductId = e.target.getAttribute("data-id");
          console.log(ProductId);
          var ajax = new XMLHttpRequest();
          ajax.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              var sDataFromServer = this.responseText;
            }
          }
          //console.log(UserId);
          ajax.open("GET", "api/api-delete-product.php?id="+ProductId, true);
          ajax.send();
          window.location.replace("index.php");
          }

          //To Edit the products
          if (e.target.classList.contains("btnEditProduct")){
            document.getElementById("editProduct").style.display = "flex";
            var ProductId = e.target.getAttribute("data-id");
            var ajax = new XMLHttpRequest();
            ajax.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                var sDataFromServer = this.responseText;
                var jDataFromServer = JSON.parse(sDataFromServer);
                  //console.log(jDataFromServer);
                  txtEditProductName.value = jDataFromServer.name;
                  txtEditProductPrice.value = jDataFromServer.price;
                  txtEditProductId.value = jDataFromServer.id;
              }
            }
            ajax.open("GET", "api/api-get-product.php?id="+ProductId, true);
            ajax.send();
          }


          //To Submit the new product info
          if (e.target.classList.contains("btnSaveEditedProduct")){
            //console.log('x');
            var ajax = new XMLHttpRequest();
            ajax.onreadystatechange = function() {

              if (this.readyState == 4 && this.status == 200) {
                var sDataFromServer = this.responseText;
                var jDataFromServer = JSON.parse(sDataFromServer);
                  //console.log(jDataFromServer);
              }
            }
            ajax.open("POST", "api/api-update-product.php", true);
            var jFrmEditProduct = new FormData( frmEditProduct );
            ajax.send(jFrmEditProduct);
            document.getElementById("editProduct").style.display = "none";
          }

          //DELETE USER!
          if (e.target.classList.contains("btnDeleteUserMyProfile")) {
            var UserId = e.target.getAttribute("data-id");
            //console.log(UserId);
            var ajax = new XMLHttpRequest();
            ajax.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                var sDataFromServer = this.responseText;
                logOut();
              }
            }
            //console.log(UserId);
            ajax.open("GET", "api/api-delete-user.php?id="+UserId, true);
            ajax.send();
            }

            //To edit the USER profile
            if (e.target.classList.contains("btnEditUserMyProfile")){
              var UserId = e.target.getAttribute("data-id");
              var ajax = new XMLHttpRequest();
              ajax.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  var sDataFromServer = this.responseText;
                  var jDataFromServer = JSON.parse(sDataFromServer);

                    txtEditUserFirstName.value = jDataFromServer.firstname;
                    txtEditUserLastName.value = jDataFromServer.lastname;
                    txtEditUserEmail.value = jDataFromServer.email;
                    txtEditUserPassword.value = jDataFromServer.password;
                    txtEditUserMobile.value = jDataFromServer.mobile;
                    txtEditUserId.value = jDataFromServer.id;
                }
              }
              ajax.open("GET", "api/api-get-user.php?id="+UserId, true);
              ajax.send();
            }

            //HEART the product to send it to the HEARTCART
            if (e.target.classList.contains("btnBuyProductIcon")){
              //var aSelectedProducts = [];
              e.target.style.background = "url(images/icon_red.svg) no-repeat";
              var productId = e.target.getAttribute("data-id");
              console.log(productId);
              //aSelectedProducts.push(productId);

              var ajax = new XMLHttpRequest();
              ajax.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                  }
              }
              ajax.open("GET", "api/api-buy-product.php?id="+productId , true);
              ajax.send();
            }

            //Open the HEARTCART
            if (e.target.classList.contains("btnToCart")){
              //console.log("yes");
              var ajax = new XMLHttpRequest();
              ajax.onreadystatechange = function() {

              if (this.readyState == 4 && this.status == 200) {
                    var sDataFromServer = this.responseText;
                    var jDataFromServer = JSON.parse(sDataFromServer);

                    var divShowItemsInCart = document.getElementById('showMyCart');
                    var sDivShowAllItems = "";
                    var priceDK = "kr.";

                    for (var i = 0; i < jDataFromServer.length; i++) {

                      sProductName = jDataFromServer[i].name;
                      sProductPrice = jDataFromServer[i].price;
                      sProductImage = jDataFromServer[i].image;

                      sDivShowAllItems += '<div class="productInCart"><img style="height: 140px; border-radius: 2px; margin-bottom: 15px;" src="'+sProductImage+'" alt=""><h3>'+sProductName+'</h3><p>'+sProductPrice+' '+priceDK+'</p></div>';
                    }
                    divShowItemsInCart.innerHTML = sDivShowAllItems;
                  }
              }
              ajax.open("GET", "api/api-get-cart.php" , true);
              ajax.send();
            }
      });

  		// * * * * * * * * * *  LOGIN * * * * * * * * * * //
  		btnLogin.addEventListener( "click" , function(){
        var message = document.querySelector("#pageLogError");
        var divAllProducts = document.getElementById('divAllProducts');
  		  var ajax = new XMLHttpRequest();
  		  ajax.onreadystatechange = function()
  		  {
  		    if (this.readyState == 4 && this.status == 200)
  		    {
  		     	var jDataFromServer = JSON.parse( this.responseText );

  		   		if( jDataFromServer.login == "ok" )
  		   		{
  						var aPages = document.getElementsByClassName("page");
  						for (var j = 0; j < aPages.length; j++) {
  							aPages[j].style.display = "none";
  						}
              window.location.replace("index.php");
            }
  					else
  					{
  						message.style.display = "block";
  					}
  	   		}
  	    }
  		  ajax.open( "POST", "api/api-login.php" , true );
  		  var jFrmLogin = new FormData( frmLogin );
  		  ajax.send( jFrmLogin );
  		});

  		//When clicked on logout
  		menuLogOut.addEventListener( "click" , function(){
  			//console.log("X");
        logOut();
  		});

      // * * * * * * * * * *  SUBSCRIBE * * * * * * * * * * //
      btnSubscribeEmail.addEventListener( "click" , function(){
        var ajax = new XMLHttpRequest();
        //console.log("ég er að klikka");
        ajax.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            var sDataFromServer = this.responseText;
            //console.log("THE SERVER SEND ME THIS:" , sDataFromServer);
          }
        }
        ajax.open( "POST", "api/api-submit-email.php", true );
        // What am I posting ?????
        var jFrmUserEmail = new FormData( frmUserEmail );
        // console.log(sFrmUser);
        ajax.send( jFrmUserEmail );
        playYeahSound();
        notifyMe();
      });

      // * * * * * * * * * *  SUBMIT NEW USER  * * * * * * * * * * //
      btnSubmit.addEventListener( "click" , function(){
        var ajax = new XMLHttpRequest();
        //console.log("ég er að klikka");
        ajax.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            var sDataFromServer = this.responseText;
            //console.log("THE SERVER SEND ME THIS:" , sDataFromServer);
          }
        }
        ajax.open( "POST", "api/api-submit-user.php", true );
        // What am I posting ?????
        var jFrmUser = new FormData( frmUser );
        // console.log(sFrmUser);
        ajax.send( jFrmUser );
      });

      // * * * * * * * * * *  SHOW ADMIN ALL USERS * * * * * * * * * * //
      var menuShowAllUsers = document.querySelector("#menuShowAllUsers");
      if (menuShowAllUsers) {
        //click menu All Users to show all users
        menuShowAllUsers.addEventListener( "click", function(){
          // console.log("button cl");
          document.getElementById("profileImage").style.display = "none";
          var ajax = new XMLHttpRequest();
          ajax.onreadystatechange = function()
          {
            if (this.readyState == 4 && this.status == 200){
              var sDataFromServer = this.responseText;
              var jDataFromServer = JSON.parse( sDataFromServer );

                var divShowAllUsers = document.getElementById('divShowAllUsers');

                var sDivShowUserInfo = "";
                for (var i = 0; i < jDataFromServer.length; i++) {

                    sUserId = jDataFromServer[i].id;
                    sUserFirstName = jDataFromServer[i].firstname;
                    sUserLastName = jDataFromServer[i].lastname;
                    sUserEmail = jDataFromServer[i].email;
                    sUserMobile = jDataFromServer[i].mobile;
                    sUserUserRole = jDataFromServer[i].userrole;
                    sUserImage = jDataFromServer[i].image;

                    sDivShowUserInfo += '<div class="col"><img style="height: 150px; border-radius: 2px; margin-bottom: 15px;" src="'+sUserImage+'" alt=""><h3>'+sUserFirstName+' '+sUserLastName+'</h3><p>'+sUserEmail+'</p><p>'+sUserMobile+'</p><button class="btnShowPage btnEditUser" data-showThisPage="pageEditUser" type="button" data-id="'+sUserId+'">EDIT</button><button class="btnDeleteUser" type="button" data-id="'+sUserId+'">DELETE</button></div>';
                }
                divShowAllUsers.innerHTML = sDivShowUserInfo;
            }
          }
          ajax.open( "GET", "api/api-all-users.php" , true );
          ajax.send();
        });
      }

      // * * * * * * * * * *  SHOW ALL PRODUCTS * * * * * * * * * * //
      menuShowAllProducts.addEventListener( "click", function(){
        document.getElementById("profileImage").style.display = "none";
        //console.log("button click");
        var ajax = new XMLHttpRequest();
        ajax.onreadystatechange = function()
        {
          if (this.readyState == 4 && this.status == 200){
            var sDataFromServer = this.responseText;
            var jDataFromServer = JSON.parse( sDataFromServer );

              var divShowAllProducts = document.getElementById('divShowAllProducts');
              var sDivShowProductInfo = "";
              var priceDK = "kr.";
              for (var i = 0; i < jDataFromServer.length; i++) {

                  sProductId = jDataFromServer[i].id;
                  sProductName = jDataFromServer[i].name;
                  sProductPrice = jDataFromServer[i].price;
                  sProductImage = jDataFromServer[i].image;

                  sDivShowProductInfo += '<div class="productCard"><img style="height: 320px; border-radius: 2px; margin-bottom: 15px;" src="'+sProductImage+'" alt=""><h3>'+sProductName+'</h3><p>'+sProductPrice+' '+priceDK+'</p><button class="btnEditProduct" type="button" data-id="'+sProductId+'">EDIT</button><button class="btnDeleteProduct" type="button" data-id="'+sProductId+'">DELETE</button></div>';

              }
              divShowAllProducts.innerHTML = sDivShowProductInfo;
          }
        }
        ajax.open( "GET", "api/api-all-products.php" , true );
        ajax.send();
      });

      // * * * * * * * * * *  Function to get products for store * * * * * * * * * * //
      function showMyProductStore(){
        var ajax = new XMLHttpRequest();
        ajax.onreadystatechange = function()
        {
          if (this.readyState == 4 && this.status == 200){
            var sDataFromServer = this.responseText;
            var jDataFromServer = JSON.parse( sDataFromServer );

              var shopContent = document.getElementById('shopContent');
              var sDivShowProductInfo = "";
              var priceDK = "kr.";
              for (var i = 0; i < jDataFromServer.length; i++) {

                  sProductId = jDataFromServer[i].id;
                  sProductName = jDataFromServer[i].name;
                  sProductPrice = jDataFromServer[i].price;
                  sProductImage = jDataFromServer[i].image;

                  sDivShowProductInfo += '<div class="productCard"><img style="width: 310px;" src="'+sProductImage+'" alt=""><div class="productCardInfoIcon"><div class="productCardInfo"><h3>'+sProductName+'</h3><p>'+sProductPrice+' '+priceDK+'</p></div><div class="productCardIcon"><button class="btnBuyProduct" type="button" name="button" data-id="'+sProductId+'"><div class="btnBuyProductIcon" data-id="'+sProductId+'"></div></button></div></div></div>';

              }
              shopContent.innerHTML = sDivShowProductInfo;
          }
        }
        ajax.open( "GET", "api/api-all-products.php" , true );
        ajax.send();
      }
      showMyProductStore();

      // * * * * * * * * * *  ADD NEW PRODUCT * * * * * * * * * * //
      btnAddProduct.addEventListener( "click" , function(){
        document.getElementById("addProducts").style.display = "flex";
        });

      // * * * * * * * * * *  CLOSE "ADD NEW PRODUCT" MODAL  * * * * * * * * * * //
      btnCloseAddProduct.addEventListener( "click" , function(){
        //console.log("X");
        document.getElementById("addProducts").style.display = "none";
      });

      // * * * * * * * * * *  CLOSE "EDIT PRODUCT" MODAL  * * * * * * * * * * //
      btnCloseEditProduct.addEventListener( "click" , function(){
        //console.log("X");
        document.getElementById("editProduct").style.display = "none";
      });

      // * * * * * * * * * *  When closeing the sign up, display none on error message * * * * * * * * * * //
      btnCloseSignUp.addEventListener( "click" , function(){
        var message = document.querySelector("#pageLogError");
        message.style.display = "none";
      });

      // * * * * * * * * * *  Post the Add Product info from form * * * * * * * * * * //
      btnSaveProduct.addEventListener( "click" , function(){
        var ajax = new XMLHttpRequest();
        //console.log("I am clicking on the submit button");
        ajax.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            var sDataFromServer = this.responseText;
          }
        }
        ajax.open( "POST", "api/api-add-products.php", true );
        var jFrmAddProduct = new FormData( frmAddProduct );
        // console.log(sFrmUser);
        ajax.send( jFrmAddProduct );
      });

      // * * * * * * * * * *  Click My profile in MENU  * * * * * * * * * * //
      menuShowMyProfile.addEventListener( "click", function(){
        document.getElementById("profileImage").style.display = "none";
        // console.log("X");
        var ajax = new XMLHttpRequest();
  		  ajax.onreadystatechange = function()
  		  {
  		    if (this.readyState == 4 && this.status == 200){
            var sDataFromServer = this.responseText;
            var jDataFromServer = JSON.parse( sDataFromServer );

              var pageMyProfile = document.getElementById('pageMyProfile');

              var sDivShowUserProfile = "";
              for (var i = 0; i < jDataFromServer.length; i++) {
                if (loggedInUser == jDataFromServer[i].id ) {
                  sUserId = jDataFromServer[i].id;
                  sUserFirstName = jDataFromServer[i].firstname;
                  sUserLastName = jDataFromServer[i].lastname;
                  sUserEmail = jDataFromServer[i].email;
                  sUserMobile = jDataFromServer[i].mobile;
                  sUserUserRole = jDataFromServer[i].userrole;
                  sUserImage = jDataFromServer[i].image;

                  sDivShowUserProfile += '<div class="myProfileImage"><img src="'+sUserImage+'" alt=""><div class="myProfileInfo"><h2>'+sUserFirstName+' '+sUserLastName+'</h2><p>'+sUserEmail+'</p><p>'+sUserMobile+'</p><button class="btnEditUserMyProfile btnShowPage" data-showThisPage="pageEditUser" type="button" data-id="'+sUserId+'">EDIT</button><button class="btnDeleteUserMyProfile" type="button" data-id="'+sUserId+'">DELETE</button></div></div>';
                }
              }
              pageMyProfile.innerHTML = sDivShowUserProfile;
  	   		}
  	    }
  		  ajax.open( "GET", "api/api-user-profile.php" , true );
  		  ajax.send();
      });

      // * * * * * * * * * *  LOGOUT Function  * * * * * * * * * * //
      function logOut(){
        var ajax = new XMLHttpRequest();
        ajax.onreadystatechange = function()
        {
          if (this.readyState == 4 && this.status == 200)
          {
            //console.log("logged out");
            window.location.replace("index.php");
          }
        }
        ajax.open( "GET", "api/api-end-session.php" , true );
        ajax.send();
      }

      // * * * * * * * * * *  Set the sound file  * * * * * * * * * * //
      var oSound = new Audio('sounds/yeah.wav');
      // * * * * * * * * * *  Function to play the sound  * * * * * * * * * * //
      function playYeahSound(){
        oSound.play();
      }

      // * * * * * * * * * *  Function to play the sound  * * * * * * * * * * //
      function notifyMe() {
        // Let's check whether notification permissions have already been granted
          if (Notification.permission === "granted") {
          // If it's okay let's create a notification
          displayNotification();
        }
        // Otherwise, we need to ask the user for permission
        else if (Notification.permission !== 'denied') {
          Notification.requestPermission(function (permission) {
            // If the user accepts, let's create a notification
            if (permission === "granted") {
              displayNotification();
            }
          });
        }
      // Finally, if the user has denied notifications and you
      // want to be respectful there is no need to bother them any more.
      }

      // * * * * * * * * * *  Function to display Google Notification * * * * * * * * * * //
      function displayNotification(){
        var notification = new Notification('You have successfully subscribed!', {
                                  "icon": 'images/alert.png'
                                  });
      }

      // * * * * * * * * * * GOOGLE MAPS!! * * * * * * * * * * //
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: {lat: 55.694987, lng: 12.486357}
        });
        setMarkers(map);
      }
      // Data for the markers consisting of a name, a LatLng and a zIndex for the
      // order in which these markers should display on top of each other.
      var shopsOnMap = [
        ['Vanløse Store', 55.694987, 12.486357],
        ['Frederiksberg Store', 55.683463, 12.528285],
        ['Indre By Store', 55.690083, 12.572946]
      ];
      function setMarkers(map) {
        for (var i = 0; i < shopsOnMap.length; i++) {
          var shop = shopsOnMap[i];
          var marker = new google.maps.Marker({
            position: {lat: shop[1], lng: shop[2]},
            map: map,
            title: shop[0]
          });
        }
      }

      // * * * * * * * * * * Shop Location * * * * * * * * * * //
      seeShopLocation.addEventListener("click", function(){
        //console.log("o");
        document.getElementById("mapModal").style.display = "block";
        document.body.style.overflow = "hidden";
        initMap();
      });

      // * * * * * * * * * * Close Shop Location * * * * * * * * * * //
      btnCloseMapModal.addEventListener("click", function(){
        //console.log("x");
        document.getElementById("mapModal").style.display = "none";
        document.body.style.overflow = "visible";
      });

      function clearCart() {
        var ajax = new XMLHttpRequest();
        ajax.onreadystatechange = function()
        {
          if (this.readyState == 4 && this.status == 200)
          {
            //console.log("logged out");
            window.location.replace("index.php");
          }
        }
        ajax.open( "GET", "api/api-clear-cart.php" , true );
        ajax.send();
      }

      // * * * * * * * * * * Clear the HEARTCART * * * * * * * * * * //
      btnClearCart.addEventListener("click", function() {
        clearCart();
      });

      // * * * * * * * * * * TO HEARTCART * * * * * * * * * * //
      btnGoToCart.addEventListener("click", function() {
        document.getElementById("shopContent").style.display = "none";
        document.getElementById("shopSubscribe").style.display = "none";
        document.getElementById("shopLocation").style.display = "none";
        document.getElementById("shopCart").style.display = "block";
        document.getElementById("btnBackToStore").style.display = "block";
        // document.getElementById("btnBuyInCart").style.display = "block";
      });

      // * * * * * * * * * * BACK TO WEBSHOP * * * * * * * * * * //
      btnBackToStore.addEventListener("click", function() {
        document.getElementById("shopContent").style.display = "flex";
        document.getElementById("shopSubscribe").style.display = "flex";
        document.getElementById("shopLocation").style.display = "block";
        document.getElementById("shopCart").style.display = "none";
        // document.getElementById("btnBuyInCart").style.display = "none";
      });

      btnBuyInCart.addEventListener("click", function() {
        alert("Yeah you have just bougth lot's of nice things!");
        clearCart();
        });
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDHlO9JID2ms_HubhY7yt5NYvG989XM4kM&callback=initMap">
    </script>


  </body>
</html>
