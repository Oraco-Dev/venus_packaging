document.addEventListener("DOMContentLoaded", function() {
    
    // COLUMN 1
    let packagingProductsParent = document.getElementById("packaging-products-parent-c1");
    let machineryProductsParent = document.getElementById("machinery-products-parent-c1");
    let pitProductsParent = document.getElementById("pit-products-parent-c1");
    let silageProductsParent = document.getElementById("silage-products-parent-c1");
    let netwrapProductsParent = document.getElementById("netwrap-products-parent-c1");
    let balerProductsParent = document.getElementById("baler-products-parent-c1");

    // COLUMN 2
    let packagingProductsParentSecondary = document.getElementById("packaging-products-parent-c2");
    let machineryProductsParentSecondary = document.getElementById("machinery-products-parent-c2");
    // TITLES
  
    let packagingMenuTitle2 = document.getElementById("packing-menu-title-col-2");
    let packagingMenuTitle3 = document.getElementById("packing-menu-title-col-3");
    let cropMenuTitle3 = document.getElementById("crop-menu-title-col-3");

    // COLUMN 2
    let polybagsProductsSecondary = document.getElementById("polybags-product-parent");
    let tapesProductsSecondary = document.getElementById("tapes-product-parent");
    let strappingProductsSecondary = document.getElementById("strapping-product-parent");
    let wrappingProductsSecondary = document.getElementById("wrapping-product-parent");
    let packagingProductsSecondary = document.getElementById("packaging-product-parent");
    let machineryProductsSecondary = document.getElementById("machinery-product-parent");
    let strappingMachineProductsSecondary = document.getElementById("strapping-machine-product-parent");
    let palletMachineProductsSecondary = document.getElementById("pallet-machine-product-parent");
    let cartonMachineProductsSecondary = document.getElementById("carton-machine-product-parent");
    let shrinkMachineProductsSecondary = document.getElementById("shrink-machine-product-parent");
  
    // COLUMN 3
    let polybagsProductsList = document.getElementById("polybags-products-list");
    let tapesProductsList = document.getElementById("tapes-products-list");
    let strappingProductsList = document.getElementById("strapping-products-list");
    let wrappingProductsList = document.getElementById("wrapping-products-list");
    let packagingProductsList = document.getElementById("packaging-products-list");
    let heatProductsList = document.getElementById("heat-products-list");
    // 
    let balerProductsList = document.getElementById("baler-products-list");
    let netwrapProductsList = document.getElementById("netwrap-products-list");
    let silageProductsList = document.getElementById("silage-products-list");
    let pitProductsList = document.getElementById("silage-pit-products-list");
       // 
    let strappingMachineProductsList = document.getElementById("strapping-machine-products-list");
    let palletMachineProductsList = document.getElementById("pallet-machine-products-list");
    let cartonMachineProductsList = document.getElementById("carton-machine-products-list");
    let shrinkMachineProductsList = document.getElementById("shrink-machine-products-list");


    // PACKAGING PRODUCTS
    // COLUMN 1
    packagingProductsParent.addEventListener("mouseover", function() {
 
        packagingProductsParentSecondary.style.display = "flex";
        packagingMenuTitle2.textContent = 'Packaging products';
        // Hide other lists
        machineryProductsParentSecondary.style.display = "none";
        polybagsProductsList.style.display = "none";
        tapesProductsList.style.display = "none";
        strappingProductsList.style.display = "none";
        wrappingProductsList.style.display = "none";
        packagingProductsList.style.display = "none";
        palletMachineProductsList.style.display = "none";
        shrinkMachineProductsList.style.display = "none";
        cartonMachineProductsList.style.display = "none";
        strappingMachineProductsList.style.display = "none";
    });

    machineryProductsParent.addEventListener("mouseover", function() {
     
        machineryProductsParentSecondary.style.display = "flex";
        packagingMenuTitle2.textContent = 'Machinery';
        // Hide other lists
        packagingProductsParentSecondary.style.display = "none";
        polybagsProductsList.style.display = "none";
        tapesProductsList.style.display = "none";
        strappingProductsList.style.display = "none";
        wrappingProductsList.style.display = "none";
        packagingProductsList.style.display = "none";
        palletMachineProductsList.style.display = "none";
        shrinkMachineProductsList.style.display = "none";
        cartonMachineProductsList.style.display = "none";
        strappingMachineProductsList.style.display = "none";
    });
    
    // COLUMN 2
    polybagsProductsSecondary.addEventListener("mouseover", function() {
  
        polybagsProductsList.style.display = "flex";
        packagingMenuTitle3.textContent = 'Polybags & Netting';
          // Hide other lists
        tapesProductsList.style.display = "none";
        strappingProductsList.style.display = "none";
        wrappingProductsList.style.display = "none";
        packagingProductsList.style.display = "none";
        heatProductsList.style.display = "none";
        palletMachineProductsList.style.display = "none";
        shrinkMachineProductsList.style.display = "none";
        cartonMachineProductsList.style.display = "none";
        strappingMachineProductsList.style.display = "none";
    });

    tapesProductsSecondary.addEventListener("mouseover", function() {
  

        tapesProductsList.style.display = "flex";
        packagingMenuTitle3.textContent = 'Tapes, Ties & Glues';
          // Hide other lists
        polybagsProductsList.style.display = "none";
        strappingProductsList.style.display = "none";
        wrappingProductsList.style.display = "none";
        packagingProductsList.style.display = "none";
        heatProductsList.style.display = "none";
        palletMachineProductsList.style.display = "none";
        shrinkMachineProductsList.style.display = "none";
        cartonMachineProductsList.style.display = "none";
        strappingMachineProductsList.style.display = "none";
    });

    strappingProductsSecondary.addEventListener("mouseover", function() {
  
        strappingProductsList.style.display = "flex";
        packagingMenuTitle3.textContent = 'Strapping & Stapling';
          // Hide other lists
        polybagsProductsList.style.display = "none";
        tapesProductsList.style.display = "none";
        wrappingProductsList.style.display = "none";
        packagingProductsList.style.display = "none";
        heatProductsList.style.display = "none";
        palletMachineProductsList.style.display = "none";
        shrinkMachineProductsList.style.display = "none";
        cartonMachineProductsList.style.display = "none";
        strappingMachineProductsList.style.display = "none";
    });

    wrappingProductsSecondary.addEventListener("mouseover", function() {
  
        wrappingProductsList.style.display = "flex";
        packagingMenuTitle3.textContent = 'Wrapping';
          // Hide other lists
        polybagsProductsList.style.display = "none";
        tapesProductsList.style.display = "none";
        strappingProductsList.style.display = "none";
        packagingProductsList.style.display = "none";
        heatProductsList.style.display = "none";
        palletMachineProductsList.style.display = "none";
        shrinkMachineProductsList.style.display = "none";
        cartonMachineProductsList.style.display = "none";
        strappingMachineProductsList.style.display = "none";
    });

    packagingProductsSecondary.addEventListener("mouseover", function() {
  
        packagingProductsList.style.display = "flex";
        packagingMenuTitle3.textContent = 'Packing & Labelling';
          // Hide other lists
        polybagsProductsList.style.display = "none";
        tapesProductsList.style.display = "none";
        strappingProductsList.style.display = "none";
        wrappingProductsList.style.display = "none";
        heatProductsList.style.display = "none";
        palletMachineProductsList.style.display = "none";
        shrinkMachineProductsList.style.display = "none";
        cartonMachineProductsList.style.display = "none";
        strappingMachineProductsList.style.display = "none";

    });

  machineryProductsSecondary.addEventListener("mouseover", function() {
            packagingMenuTitle3.textContent = 'Heat Sealers';
            heatProductsList.style.display = "flex";

            palletMachineProductsList.style.display = "none";
            shrinkMachineProductsList.style.display = "none";
            cartonMachineProductsList.style.display = "none";
            strappingMachineProductsList.style.display = "none";
  });

  strappingMachineProductsSecondary.addEventListener("mouseover", function() {
      packagingMenuTitle3.textContent = 'Strapping Machines';

      strappingMachineProductsList.style.display = "flex";
 
      heatProductsList.style.display = "none";
      palletMachineProductsList.style.display = "none";
      shrinkMachineProductsList.style.display = "none";
      cartonMachineProductsList.style.display = "none";
  });
  
  cartonMachineProductsSecondary.addEventListener("mouseover", function() {
    packagingMenuTitle3.textContent = 'Carton Machines';
    cartonMachineProductsList.style.display = "flex";

    heatProductsList.style.display = "none";
    palletMachineProductsList.style.display = "none";
    shrinkMachineProductsList.style.display = "none";
    strappingMachineProductsList.style.display = "none";
  });

  shrinkMachineProductsSecondary.addEventListener("mouseover", function() {
    packagingMenuTitle3.textContent = 'Shrink Wrapping Machines';

    shrinkMachineProductsList.style.display = "flex";

    heatProductsList.style.display = "none";
    palletMachineProductsList.style.display = "none";
    cartonMachineProductsList.style.display = "none";
    strappingMachineProductsList.style.display = "none";
  });

  palletMachineProductsSecondary.addEventListener("mouseover", function() {
    packagingMenuTitle3.textContent = 'Pallet Machines';
    palletMachineProductsList.style.display = "flex";

    heatProductsList.style.display = "none";
    shrinkMachineProductsList.style.display = "none";
    cartonMachineProductsList.style.display = "none";
    strappingMachineProductsList.style.display = "none";
  });


// CROP PACKAGING
// COLUMN 1
balerProductsParent.addEventListener("mouseover", function() {
 
  balerProductsList.style.display = "flex";
  cropMenuTitle3.textContent = 'Baler Twines';
  silageProductsList.style.display = "none";
  netwrapProductsList.style.display = "none";
  pitProductsList.style.display = 'none';
});

netwrapProductsParent.addEventListener("mouseover", function() {
 
  netwrapProductsList.style.display = "flex";
  cropMenuTitle3.textContent = 'Totalcover Netwrap';
  balerProductsList.style.display = "none";
  silageProductsList.style.display = "none";
  pitProductsList.style.display = 'none';
});

pitProductsParent.addEventListener("mouseover", function() {
 
  pitProductsList.style.display = 'flex';
  cropMenuTitle3.textContent = 'Silage Pit Covers';
  balerProductsList.style.display = "none";
  netwrapProductsList.style.display = "none";
  silageProductsList.style.display = "none";
});

silageProductsParent.addEventListener("mouseover", function() {
 
  silageProductsList.style.display = "flex";
  cropMenuTitle3.textContent = 'Silage Stretch Film';
  netwrapProductsList.style.display = "none";
  pitProductsList.style.display = 'none';
  balerProductsList.style.display = "none";
});
});

