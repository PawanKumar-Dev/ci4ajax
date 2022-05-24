$(document).ready(function () {
  getAllData();

  // Remove alert box after 3 seconds automatically
  function alertDisappear() {
    setTimeout(() => {
      $(".alert").css("display", "none");
    }, 3000);
  }

  // Get All data
  function getAllData() {
    $("#showproducts").html('');

    $.ajax({
      type: "get",
      url: "http://localhost/ci4ajax/fetchall",
      success: function (data) {
        const obj = JSON.parse(data)

        $.each(obj, function (key, value) {
          $("#showproducts").append(
            `<tr>
              <th scope="row">${value.id}</th>
              <td>${value.product_name}</td>
              <td>${value.product_brand}</td>
              <td>$${value.product_price}</td>
              <td>${value.product_category}</td>
              <td>${value.product_desc}</td>
              <td>${value.product_img}</td>
              <td><button id="editbtn" data-eid="${value.id}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></button></td>
              <td><button id="delbtn" data-did="${value.id}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button></td>
            </tr>`
          );
        });
      }
    });
  }

  $("#add_product").click(function () {
    $('#insert_form').trigger("reset");
    $("#exampleModal").modal("show");
  });

  // Submitting Form and Inserting new data
  $("#insert_form").submit(function (e) {
    e.preventDefault();

    let src = $("#pimage").val();
    let arr = src.split('\\');
    let imgname = arr[arr.length - 1];

    const insertValue = {
      product_name: $("#pname").val(),
      product_brand: $("#pbrand").val(),
      product_price: $("#pprice").val(),
      product_category: $("#pcategory").val(),
      product_desc: $("#pdesc").val(),
      product_img: imgname
    }

    const json = JSON.stringify(insertValue);

    $.ajax({
      type: "post",
      url: "http://localhost/ci4ajax/insert",
      data: { jsondata: json },
      dataType: "json",
      success: function (response) {
        if (response.status == 200) {
          $("#showdata").append('<div class="alert alert-success alert-dismissible fade show" role="alert">Data Inserted <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {
          $("#showdata").append('<div class="alert alert-danger alert-dismissible fade show" role="alert">Data Failed to be inserted <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        }

        getAllData(),
          alertDisappear()
      }
    });
  });


  // Remove item from table
  $(document).on("click", "#delbtn", function () {
    let delid = $(this).data("did");

    let obj = {
      delid: delid
    }
    const json = JSON.stringify(obj);

    $.ajax({
      type: "post",
      url: "http://localhost/ci4ajax/delete",
      data: { id: json },
      dataType: "json",
      success: function (response) {
        if (response.status == 200) {
          $("#showdata").append('<div class="alert alert-success alert-dismissible fade show" role="alert">Data Removed <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {
          $("#showdata").append('<div class="alert alert-danger alert-dismissible fade show" role="alert">Data Failed to be removed <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        }

        getAllData(),
          alertDisappear()
      }
    });
  });


  // Edit Item
  $(document).on("click", "#editbtn", function () {
    let editid = $(this).data("eid");
    let obj = {
      editid: editid
    }
    const json = JSON.stringify(obj);

    $.ajax({
      type: "post",
      url: "http://localhost/ci4ajax/edit",
      data: { id: json },
      dataType: "json",
      success: function (data) {
        $("#pname").val(data[0].product_name);
        $("#pbrand").val(data[0].product_brand);
        $("#pprice").val(data[0].product_price);
        $("#pcategory").val(data[0].product_category);
        $("#pdesc").val(data[0].product_desc);
        $("#pro_id").val(data[0].id);

        $("#editModalExample").modal("show");
      }
    });
  });



  // Update Item
  $(document).on("submit", "#update_form", function (e) {
    e.preventDefault();

    let src = $("#pimage").val();
    let arr = src.split('\\');
    let imgname = arr[arr.length - 1];

    const updateValue = {
      product_name: $("#pname").val(),
      product_brand: $("#pbrand").val(),
      product_price: $("#pprice").val(),
      product_category: $("#pcategory").val(),
      product_desc: $("#pdesc").val(),
      product_img: imgname,
      product_id: $("#pro_id").val()
    }

    const json = JSON.stringify(updateValue);
    console.log(json);

    $.ajax({
      type: "post",
      url: "http://localhost/ci4ajax/update",
      data: { jsondata: json },
      dataType: "json",
      success: function (response) {
        if (response.status == 200) {
          $("#showdata").append('<div class="alert alert-success alert-dismissible fade show" role="alert">Data Updated <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {
          $("#showdata").append('<div class="alert alert-danger alert-dismissible fade show" role="alert">Data Updated failed <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        }

        getAllData(),
          alertDisappear()
      }
    });
  });

});