<?php
session_start();
include_once('../includes/config.php');

function filter_students_data_in_database($studentsLimited, $studentsOrder)
{
  global $conn;

  // Modify the query based on your database structure
  $students_query = "SELECT * FROM `students`
    ORDER BY `st_id` $studentsOrder LIMIT $studentsLimited";

  $students_result = mysqli_query($conn, $students_query);
  $students_data = mysqli_fetch_all($students_result, MYSQLI_ASSOC);

  $data = '';
  $no = 1;
  foreach ($students_data as $students) {

    $data .= '

        <tr>
        <td>
          <p class="mb-0 fs-2 inter">' . $no++ . '</p>
        </td>
        <td>
          <p class="mb-0 fs-2 inter">' . $students['st_roll_no'] . '</p>
        </td>
        <td>
          <p class="mb-0 fs-4 word-spacing-2px">' . $students['std_name'] . '</p>
        </td>
        <td>
          <p class="mb-0 fs-4 word-spacing-2px">' . $students['guar_name'] . '</p>
        </td>
        <td>
          <p class="mb-0 fs-2 inter">' . $students['guar_number'] . '</p>
        </td>
        <td>';
    if ($students['status'] === 'فعال') {
      $data .= ' <p class="mb-0 fs-4 jameel-kasheeda bg-primary text-center text-white rounded-2">' . $students['status'] . '</p>';
    } elseif ($students['status'] === 'غیر فعال') {
      $data .= ' <p class="mb-0 fs-4 jameel-kasheeda bg-danger  text-center text-white rounded-2">' . $students['status'] . '</p>';
    }
    $data .= ' </td>
        <td>
          <div class="action-btn">';
    if ($students['status'] !== 'غیر فعال') {
      $data .= '<a href="st-profile.php?st_view_profile=' . $students['st_id'] . '" class="text-info ms-1"><i class="ti ti-eye fs-6"></i></a>';
    }
    if ($students['status'] !== 'غیر فعال') {
      $data .= '<a href="st-admission-edit.php?st_edit=' . $students['st_id'] . '" class="text-success"><i class="ti ti-edit fs-6"></i></a>';
    }
    if ($students['status'] !== 'غیر فعال') {
      $data .= '
              <button type="button" class="border-0  rounded-2 p-0 py-1 bg-white" data-bs-toggle="modal" data-bs-target="#deleteModal' . $students['st_id'] . '">
              <span><i class="fs-5 ti ti-trash  text-danger p-1 "></i></span>
            </button>';
    }
    $data .= ' <div class="modal fade" id="deleteModal' . $students['st_id'] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">یقینی طور پر حذف کر رہے ہیں؟ </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">کلوز</button>
                    <a href="code2.php?st_delete=' . $students['st_id'] . '">
                      <button type="button" class="btn btn-danger">ڈیلیٹ</button>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </td>
      </tr>

                ';
  }

  // Check if $data is empty
  if (empty($data)) {
    $data = '<tr>
                    <td colspan="7" class="fw-semibold bg-light-warning text-warning text-center">There are no Students data from database.</td>
                </tr>';
  }

  return $data;
}

function search_students_data_in_database($searchRollNum, $searchName, $searchPhone, $searchDate)
{
  global $conn;

  // anitialize user input
  $searchRollNum = mysqli_real_escape_string($conn, $searchRollNum);
  $searchName = mysqli_real_escape_string($conn, $searchName);
  $searchPhone = mysqli_real_escape_string($conn, $searchPhone);
  $searchDate = mysqli_real_escape_string($conn, $searchDate);

  // Modify the query based on your database structure
  $search_query = "SELECT * FROM `students`";

  // search by one field
  if (!empty($searchRollNum)) {
    $search_query .= " WHERE `st_roll_no` LIKE '%$searchRollNum%'";
  } elseif (!empty($searchName)) {
    $search_query .= " WHERE `std_name` LIKE '%$searchName'";
  } elseif (!empty($searchPhone)) {
    $search_query .= " WHERE `guar_name` LIKE '%$searchPhone%'";
  } elseif (!empty($searchDate)) {
    $search_query .= " WHERE `adm_date` LIKE '%$searchDate%'";
  }


  $search_result = mysqli_query($conn, $search_query);
  $search_data = mysqli_fetch_all($search_result, MYSQLI_ASSOC);

  $data = '';
  $no = 1;
  foreach ($search_data as $search) {


    $data .= '

    <tr>
    <td>
      <p class="mb-0 fs-2 inter">' . $no++ . '</p>
    </td>
    <td>
      <p class="mb-0 fs-2 inter">' . $search['st_roll_no'] . '</p>
    </td>
    <td>
      <p class="mb-0 fs-4 word-spacing-2px">' . $search['std_name'] . '</p>
    </td>
    <td>
      <p class="mb-0 fs-4 word-spacing-2px">' . $search['guar_name'] . '</p>
    </td>
    <td>
      <p class="mb-0 fs-2 inter">' . $search['guar_number'] . '</p>
    </td>
    <td>';
    if ($search['status'] === 'فعال') {
      $data .= ' <p class="mb-0 fs-4 jameel-kasheeda bg-primary text-center text-white rounded-2">' . $search['status'] . '</p>';
    } elseif ($search['status'] === 'غیر فعال') {
      $data .= ' <p class="mb-0 fs-4 jameel-kasheeda bg-danger  text-center text-white rounded-2">' . $search['status'] . '</p>';
    }
    $data .= ' </td>
    <td>
      <div class="action-btn">';
    if ($search['status'] !== 'غیر فعال') {
      $data .= '<a href="st-profile.php?st_view_profile=' . $search['st_id'] . '" class="text-info ms-1"><i class="ti ti-eye fs-6"></i></a>';
    }
    if ($search['status'] !== 'غیر فعال') {
      $data .= '<a href="st-admission-edit.php?st_edit=' . $search['st_id'] . '" class="text-success"><i class="ti ti-edit fs-6"></i></a>';
    }
    if ($search['status'] !== 'غیر فعال') {
      $data .= '
          <button type="button" class="border-0  rounded-2 p-0 py-1 bg-white" data-bs-toggle="modal" data-bs-target="#deleteModal' . $search['st_id'] . '">
          <span><i class="fs-5 ti ti-trash  text-danger p-1 "></i></span>
        </button>';
    }
    $data .= ' <div class="modal fade" id="deleteModal' . $search['st_id'] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">یقینی طور پر حذف کر رہے ہیں؟ </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">کلوز</button>
                <a href="code2.php?st_delete=' . $search['st_id'] . '">
                  <button type="button" class="btn btn-danger">ڈیلیٹ</button>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </td>
  </tr>

            ';
  }

  // Check if $data is empty
  if (empty($data)) {
    $data = '<tr>
                <td colspan="7" class="fw-semibold bg-light-warning text-warning text-center">There are no matching data from database. ' . $searchRollNum . '' . $searchName . '' . $searchPhone . '' . $searchDate . ' </td>
            </tr>';
  }

  return $data;
}


function filter_dokan_data_in_database($studentsLimited, $studentsOrder)
{
  global $conn;

  // Modify the query based on your database structure
  $dokan_query = "SELECT * FROM `dokan`
    ORDER BY `dokan_id` $studentsOrder LIMIT $studentsLimited";

  $dokan_result = mysqli_query($conn, $dokan_query);
  $dokan_data = mysqli_fetch_all($dokan_result, MYSQLI_ASSOC);

  $data = '';
  $no = 1;
  foreach ($dokan_data as $row_dokan) {

    $data .= '

        <tr class="text-center">
        <td>
          <p class="mb-0 fs-2 inter">' . $no++ . '</p>
        </td>
        <td>
          <p class="mb-0 fs-2 inter">' . $row_dokan['dokan_name'] . '</p>
        </td>
        <td>
          <p class="mb-0 fs-4 word-spacing-2px">' . $row_dokan['dokan_owner_name'] . '</p>
        </td>
        <td>
          <p class="mb-0 fs-4 word-spacing-2px">' . $row_dokan['dokan_type'] . '</p>
        </td>
        <td>
          <p class="mb-0 fs-2 inter">' . $row_dokan['dokan_rent'] . '</p>
        </td>
        <td>';
    if ($row_dokan['status'] === 'فعال') {
      $data .= ' <p class="mb-0 fs-4 jameel-kasheeda bg-primary text-center text-white rounded-2">' . $row_dokan['status'] . '</p>';
    } elseif ($row_dokan['status'] === 'غیر فعال') {
      $data .= ' <p class="mb-0 fs-4 jameel-kasheeda bg-danger  text-center text-white rounded-2">' . $row_dokan['status'] . '</p>';
    }
    $data .= ' </td>
        <td>
          <div class="action-btn">';
    if ($row_dokan['status'] !== 'غیر فعال') {
      $data .= ' <a href="dokan-view.php?dokan_view_id=' . $row_dokan['dokan_id'] . '" class="text-info ms-1"><i class="ti ti-eye fs-6"></i></a>';
    }
    if ($row_dokan['status'] !== 'غیر فعال') {
      $data .= ' <a href="dokan-edit.php?dokan_edit_id=' . $row_dokan['dokan_id'] . '" class="text-success"><i class="ti ti-edit fs-6"></i></a>';
    }
    if ($row_dokan['status'] !== 'غیر فعال') {
      $data .= ' 
              <button type="button" class="border-0  rounded-2 p-0 py-1 bg-white" data-bs-toggle="modal" data-bs-target="#deleteModal' . $row_dokan['dokan_id'] . '">
              <span><i class="fs-5 ti ti-trash  text-danger p-1 "></i></span>
            </button>';
    }
    $data .= ' <div class="modal fade" id="deleteModal' . $row_dokan['dokan_id'] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">یقینی طور پر حذف کر رہے ہیں؟ </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">کلوز</button>
                    <a href="code2.php?dokan_delete_id=' . $row_dokan['dokan_id'] . '">
                      <button type="button" class="btn btn-danger">ڈیلیٹ</button>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </td>
      </tr>

                ';
  }

  // Check if $data is empty
  if (empty($data)) {
    $data = '<tr>
                    <td colspan="7" class="fw-semibold bg-light-warning text-warning text-center">There are no Dokan data from database.</td>
                </tr>';
  }

  return $data;
}

function search_dokan_data_in_database($searchName, $searchType)
{
  global $conn;

  // anitialize user input
  $searchName = mysqli_real_escape_string($conn, $searchName);
  $searchType = mysqli_real_escape_string($conn, $searchType);

  // Modify the query based on your database structure
  $dokan_query = "SELECT * FROM `dokan`";

  if (!empty($searchName) && !empty($searchType)) {
    $dokan_query .= " WHERE `dokan_name` LIKE '%" . $searchName . "%' AND `dokan_type` LIKE '%" . $searchType . "%'";
  } elseif (!empty($searchName)) {
    $dokan_query .= " WHERE `dokan_name` LIKE '%" . $searchName . "%'";
  } elseif (!empty($searchType)) {
    $dokan_query .= " WHERE `dokan_type` LIKE '%" . $searchType . "%'";
  }

  $dokan_result = mysqli_query($conn, $dokan_query);
  $dokan_data = mysqli_fetch_all($dokan_result, MYSQLI_ASSOC);

  $data = '';
  $no = 1;
  foreach ($dokan_data as $row_dokan) {

    $data .= '

        <tr class="text-center">
        <td>
          <p class="mb-0 fs-2 inter">' . $no++ . '</p>
        </td>
        <td>
          <p class="mb-0 fs-2 inter">' . $row_dokan['dokan_name'] . '</p>
        </td>
        <td>
          <p class="mb-0 fs-4 word-spacing-2px">' . $row_dokan['dokan_owner_name'] . '</p>
        </td>
        <td>
          <p class="mb-0 fs-4 word-spacing-2px">' . $row_dokan['dokan_type'] . '</p>
        </td>
        <td>
          <p class="mb-0 fs-2 inter">' . $row_dokan['dokan_rent'] . '</p>
        </td>
        <td>';
    if ($row_dokan['status'] === 'فعال') {
      $data .= ' <p class="mb-0 fs-4 jameel-kasheeda bg-primary text-center text-white rounded-2">' . $row_dokan['status'] . '</p>';
    } elseif ($row_dokan['status'] === 'غیر فعال') {
      $data .= ' <p class="mb-0 fs-4 jameel-kasheeda bg-danger  text-center text-white rounded-2">' . $row_dokan['status'] . '</p>';
    }
    $data .= ' </td>
        <td>
          <div class="action-btn">';
    if ($row_dokan['status'] !== 'غیر فعال') {
      $data .= ' <a href="dokan-view.php?dokan_view_id=' . $row_dokan['dokan_id'] . '" class="text-info ms-1"><i class="ti ti-eye fs-6"></i></a>';
    }
    if ($row_dokan['status'] !== 'غیر فعال') {
      $data .= ' <a href="dokan-edit.php?dokan_edit_id=' . $row_dokan['dokan_id'] . '" class="text-success"><i class="ti ti-edit fs-6"></i></a>';
    }
    if ($row_dokan['status'] !== 'غیر فعال') {
      $data .= ' 
              <button type="button" class="border-0  rounded-2 p-0 py-1 bg-white" data-bs-toggle="modal" data-bs-target="#deleteModal' . $row_dokan['dokan_id'] . '">
              <span><i class="fs-5 ti ti-trash  text-danger p-1 "></i></span>
            </button>';
    }
    $data .= ' <div class="modal fade" id="deleteModal' . $row_dokan['dokan_id'] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">یقینی طور پر حذف کر رہے ہیں؟ </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">کلوز</button>
                    <a href="code2.php?dokan_delete_id=' . $row_dokan['dokan_id'] . '">
                      <button type="button" class="btn btn-danger">ڈیلیٹ</button>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </td>
      </tr>

                ';
  }

  // Check if $data is empty
  if (empty($data)) {
    $data = '<tr>
                    <td colspan="7" class="fw-semibold bg-light-warning text-warning text-center">There are no matching data from the database. ' . $searchName . ' ' . $searchType . '  </td>
                </tr>';
  }

  return $data;
}

function filter_dokan_rent_data_in_database($dokanRentLimited, $dokanRentOrder)
{
  global $conn;

  // Modify the query based on your database structure
  $dokan_query = "SELECT dokan.dokan_name, dokan.dokan_type, dokan.dokan_rent, 
  shop_rent.rent_id, shop_rent.pay_rent, shop_rent.remaining_rent, shop_rent.pay_rent_date
  FROM `shop_rent`
      INNER JOIN `dokan` ON `dokan`.`dokan_id` = `shop_rent`.`dokan_id`
    ORDER BY `rent_id` $dokanRentOrder LIMIT $dokanRentLimited";

  $dokan_result = mysqli_query($conn, $dokan_query);
  $dokan_data = mysqli_fetch_all($dokan_result, MYSQLI_ASSOC);

  $data = '';
  $no = 1;
  foreach ($dokan_data as $row_dokan) {

    $data .= '

        <tr class="text-center">
        <td>
          <p class="mb-0 fs-2 inter">' . $no++ . '</p>
        </td>
        <td>
        <p class="mb-0 fs-4 word-spacing-2px">' . $row_dokan['dokan_name'] . '</p>
        </td>
        <td>
        <p class="mb-0 fs-4 word-spacing-2px">' . $row_dokan['dokan_type'] . '</p>
        </td>
        <td>
        <p class="mb-0 fs-4 word-spacing-2px">' . $row_dokan['dokan_rent'] . '</p>
        </td>
        <td>
        <p class="mb-0 fs-2 inter">' . $row_dokan['pay_rent'] . '</p>
        </td>
        <td>
        <p class="mb-0 fs-2 inter text-danger">' . $row_dokan['remaining_rent'] . '</p>
        </td>
        <td>
          <p class="mb-0 fs-2 inter">' . $row_dokan['pay_rent_date'] . '</p>
        </td>
        <td>
          <div class="action-btn">
          <a href="dokan-rent-view.php?dokan_rent_view_id=' . $row_dokan['rent_id'] . '" class="text-info ms-1"><i class="ti ti-eye fs-6"></i></a>
          <a href="dokan-rent-edit.php?dokan_rent_edit_id=' . $row_dokan['rent_id'] . '" class="text-success"><i class="ti ti-edit fs-6"></i></a>
              <button type="button" class="border-0  rounded-2 p-0 py-1 bg-white" data-bs-toggle="modal" data-bs-target="#deleteModal' . $row_dokan['rent_id'] . '">
              <span><i class="fs-5 ti ti-trash  text-danger p-1 "></i></span>
            </button>
            <div class="modal fade" id="deleteModal' . $row_dokan['rent_id'] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">یقینی طور پر حذف کر رہے ہیں؟ </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">کلوز</button>
                    <a href="?dokan_rent_delete_id=' . $row_dokan['rent_id'] . '">
                      <button type="button" class="btn btn-danger">ڈیلیٹ</button>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </td>
      </tr>

                ';
  }

  // Check if $data is empty
  if (empty($data)) {
    $data = '<tr>
                    <td colspan="7" class="fw-semibold bg-light-warning text-warning text-center">There are no Dokan data from database.</td>
                </tr>';
  }

  return $data;
}

function search_dokan_rent_data_in_database($searchRentName, $searchRentType, $searchRentMonth)
{
  global $conn;

  // anitialize user input
  $searchName = mysqli_real_escape_string($conn, $searchRentName);
  $searchType = mysqli_real_escape_string($conn, $searchRentType);
  $searchMonth = mysqli_real_escape_string($conn, $searchRentMonth);

  // year and month format
  $year = date("Y", strtotime($searchMonth));
  $month = date("m", strtotime($searchMonth));


  // Modify the query based on your database structure
  $dokan_query = "SELECT dokan.dokan_name, dokan.dokan_type, dokan.dokan_rent, 
  shop_rent.rent_id, shop_rent.pay_rent, shop_rent.pay_rent_date, shop_rent.remaining_rent
  FROM `shop_rent` 
  INNER JOIN dokan ON dokan.dokan_id = shop_rent.dokan_id
  ";

  if (!empty($searchName) && !empty($searchType)) {
    $dokan_query .= " WHERE `dokan_name` LIKE '%" . $searchName . "%' AND `dokan_type` LIKE '%" . $searchType . "%'";
  } elseif (!empty($searchName)) {
    $dokan_query .= " WHERE `dokan_name` LIKE '%" . $searchName . "%'";
  } elseif (!empty($searchType)) {
    $dokan_query .= " WHERE `dokan_type` LIKE '%" . $searchType . "%'";
  }

  if (!empty($searchMonth)) {
    $dokan_query .= " AND MONTH(shop_rent.pay_rent_date) = $month AND YEAR(shop_rent.pay_rent_date) = $year";
  }

  $dokan_result = mysqli_query($conn, $dokan_query);
  $dokan_data = mysqli_fetch_all($dokan_result, MYSQLI_ASSOC);

  $data = '';
  $no = 1;
  foreach ($dokan_data as $row_dokan) {

    $data .= '

    <tr class="text-center">
    <td>
      <p class="mb-0 fs-2 inter">' . $no++ . '</p>
    </td>
    <td>
    <p class="mb-0 fs-4 word-spacing-2px">' . $row_dokan['dokan_name'] . '</p>
    </td>
    <td>
    <p class="mb-0 fs-4 word-spacing-2px">' . $row_dokan['dokan_type'] . '</p>
    </td>
    <td>
    <p class="mb-0 fs-4 word-spacing-2px">' . $row_dokan['dokan_rent'] . '</p>
    </td>
    <td>
    <p class="mb-0 fs-2 inter">' . $row_dokan['pay_rent'] . '</p>
    </td>
    <td>
    <p class="mb-0 fs-2 inter text-danger">' . $row_dokan['remaining_rent'] . '</p>
    </td>
    <td>
      <p class="mb-0 fs-2 inter">' . $row_dokan['pay_rent_date'] . '</p>
    </td>
    <td>
    <div class="action-btn">
          <a href="dokan-rent-view.php?dokan_rent_view_id=' . $row_dokan['rent_id'] . '" class="text-info ms-1"><i class="ti ti-eye fs-6"></i></a>
          <a href="dokan-rent-edit.php?dokan_rent_edit_id=' . $row_dokan['rent_id'] . '" class="text-success"><i class="ti ti-edit fs-6"></i></a>
              <button type="button" class="border-0  rounded-2 p-0 py-1 bg-white" data-bs-toggle="modal" data-bs-target="#deleteModal' . $row_dokan['rent_id'] . '">
              <span><i class="fs-5 ti ti-trash  text-danger p-1 "></i></span>
            </button>
            <div class="modal fade" id="deleteModal' . $row_dokan['rent_id'] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">یقینی طور پر حذف کر رہے ہیں؟ </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">کلوز</button>
                    <a href="?dokan_rent_delete_id=' . $row_dokan['rent_id'] . '">
                      <button type="button" class="btn btn-danger">ڈیلیٹ</button>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </td>
      </tr>

                ';
  }

  // Check if $data is empty
  if (empty($data)) {
    $data = '<tr>
                    <td colspan="7" class="fw-semibold bg-light-warning text-warning text-center">There are no matching data from the database. ' . $searchName . ' ' . $searchType . ' ' . $searchMonth . '  </td>
                </tr>';
  }

  return $data;
}


function filter_st_fees_data_in_database($stFeesLimited, $stFeesOrder)
{
  global $conn;

  // Modify the query based on your database structure
  $dokan_query = "SELECT st_fees_id, st_pay_fees, st_pay_fees_date, st_remaining_fees,
  students.st_roll_no, students.std_name, students.admi_fees
    FROM student_fees
      INNER JOIN students ON students.st_id = student_fees.st_id
    ORDER BY `st_fees_id` $stFeesOrder LIMIT $stFeesLimited";

  $dokan_result = mysqli_query($conn, $dokan_query);
  $dokan_data = mysqli_fetch_all($dokan_result, MYSQLI_ASSOC);

  $data = '';
  $no = 1;
  foreach ($dokan_data as $row_dokan) {

    $data .= '

        <tr class="text-center">
        <td>
          <p class="mb-0 fs-2 inter">' . $no++ . '</p>
        </td>
        <td>
        <p class="mb-0 fs-4 word-spacing-2px">' . $row_dokan['st_roll_no'] . '</p>
        </td>
        <td>
        <p class="mb-0 fs-4 word-spacing-2px">' . $row_dokan['std_name'] . '</p>
        </td>
        <td>
        <p class="mb-0 fs-4 word-spacing-2px">' . $row_dokan['admi_fees'] . '</p>
        </td>
        <td>
        <p class="mb-0 fs-2 inter">' . $row_dokan['st_pay_fees'] . '</p>
        </td>
        <td>
        <p class="mb-0 fs-2 inter text-danger">' . $row_dokan['st_remaining_fees'] . '</p>
        </td>
        <td>
          <p class="mb-0 fs-2 inter">' . $row_dokan['st_pay_fees_date'] . '</p>
        </td>
        <td>
          <div class="action-btn">
          <a href="st-fees-view.php?dokan_rent_view_id=' . $row_dokan['st_fees_id'] . '" class="text-info ms-1"><i class="ti ti-eye fs-6"></i></a>
          <a href="st-fees-edit.php?dokan_rent_edit_id=' . $row_dokan['st_fees_id'] . '" class="text-success"><i class="ti ti-edit fs-6"></i></a>
              <button type="button" class="border-0  rounded-2 p-0 py-1 bg-white" data-bs-toggle="modal" data-bs-target="#deleteModal' . $row_dokan['st_fees_id'] . '">
              <span><i class="fs-5 ti ti-trash  text-danger p-1 "></i></span>
            </button>
            <div class="modal fade" id="deleteModal' . $row_dokan['st_fees_id'] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">یقینی طور پر حذف کر رہے ہیں؟ </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">کلوز</button>
                    <a href="?dokan_rent_delete_id=' . $row_dokan['st_fees_id'] . '">
                      <button type="button" class="btn btn-danger">ڈیلیٹ</button>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </td>
      </tr>

                ';
  }

  // Check if $data is empty
  if (empty($data)) {
    $data = '<tr>
                    <td colspan="7" class="fw-semibold bg-light-warning text-warning text-center">There are no Student Fees data from database.</td>
                </tr>';
  }

  return $data;
}

function search_st_fees_data_in_database($searchStFeesRegis, $searchStFeesName, $searchStFeesMonth)
{
  global $conn;

  // anitialize user input
  $searchStFeesRegis = mysqli_real_escape_string($conn, $searchStFeesRegis);
  $searchStFeesName = mysqli_real_escape_string($conn, $searchStFeesName);
  $searchStFeesMonth = mysqli_real_escape_string($conn, $searchStFeesMonth);

  // year and month format
  $year = date("Y", strtotime($searchStFeesMonth));
  $month = date("m", strtotime($searchStFeesMonth));


  // Modify the query based on your database structure
  $dokan_query = "SELECT st_fees_id, st_pay_fees, st_pay_fees_date, st_remaining_fees,
  students.st_roll_no, students.std_name, students.admi_fees
    FROM student_fees
      INNER JOIN students ON students.st_id = student_fees.st_id
  ";

  if (!empty($searchStFeesRegis) || !empty($searchStFeesName) || !empty($searchStFeesMonth)) {
    $dokan_query .= " WHERE students.st_roll_no LIKE '%" . $searchStFeesRegis . "%' AND students.std_name LIKE '%" . $searchStFeesName . "%' AND MONTH(st_pay_fees_date) = $month AND YEAR(st_pay_fees_date) = $year";
  } elseif (!empty($searchStFeesRegis)) {
    $dokan_query .= " WHERE students.st_roll_no LIKE '%" . $searchStFeesRegis . "%'";
  } elseif (!empty($searchStFeesName)) {
    $dokan_query .= " WHERE students.std_name LIKE '%" . $searchStFeesName . "%'";
  } elseif (!empty($searchStFeesMonth)) {
    $dokan_query .= " AND MONTH(st_pay_fees_date) = $month AND YEAR(st_pay_fees_date) = $year";
  }

  $dokan_result = mysqli_query($conn, $dokan_query);
  $dokan_data = mysqli_fetch_all($dokan_result, MYSQLI_ASSOC);

  $data = '';
  $no = 1;
  foreach ($dokan_data as $row_dokan) {

    $data .= '

    <tr class="text-center">
    <td>
      <p class="mb-0 fs-2 inter">' . $no++ . '</p>
    </td>
    <td>
    <p class="mb-0 fs-4 word-spacing-2px">' . $row_dokan['st_roll_no'] . '</p>
    </td>
    <td>
    <p class="mb-0 fs-4 word-spacing-2px">' . $row_dokan['std_name'] . '</p>
    </td>
    <td>
    <p class="mb-0 fs-4 word-spacing-2px">' . $row_dokan['admi_fees'] . '</p>
    </td>
    <td>
    <p class="mb-0 fs-2 inter">' . $row_dokan['st_pay_fees'] . '</p>
    </td>
    <td>
    <p class="mb-0 fs-2 inter text-danger">' . $row_dokan['st_remaining_fees'] . '</p>
    </td>
    <td>
      <p class="mb-0 fs-2 inter">' . $row_dokan['st_pay_fees_date'] . '</p>
    </td>
    <td>
    <div class="action-btn">
          <a href="st-fees-view.php?dokan_rent_view_id=' . $row_dokan['st_fees_id'] . '" class="text-info ms-1"><i class="ti ti-eye fs-6"></i></a>
          <a href="st-fees-edit.php?dokan_rent_edit_id=' . $row_dokan['st_fees_id'] . '" class="text-success"><i class="ti ti-edit fs-6"></i></a>
              <button type="button" class="border-0  rounded-2 p-0 py-1 bg-white" data-bs-toggle="modal" data-bs-target="#deleteModal' . $row_dokan['st_fees_id'] . '">
              <span><i class="fs-5 ti ti-trash  text-danger p-1 "></i></span>
            </button>
            <div class="modal fade" id="deleteModal' . $row_dokan['st_fees_id'] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">یقینی طور پر حذف کر رہے ہیں؟ </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">کلوز</button>
                    <a href="?dokan_rent_delete_id=' . $row_dokan['st_fees_id'] . '">
                      <button type="button" class="btn btn-danger">ڈیلیٹ</button>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </td>
      </tr>

                ';
  }

  // Check if $data is empty
  if (empty($data)) {
    $data = '<tr>
                    <td colspan="7" class="fw-semibold bg-light-warning text-warning text-center">There are no matching data from the database. ' . $searchStFeesRegis . ' ' . $searchStFeesName . ' ' . $searchStFeesMonth . '  </td>
                </tr>';
  }

  return $data;
}






if (isset($_POST['action'])) {
  $action = $_POST['action'];

  // filter index-page - attendence status
  if ($action == 'load-students-Data') {
    $studentsLimited = $_POST['studentsLimited'];
    $studentsOrder = $_POST['studentsOrder'];

    $result = filter_students_data_in_database($studentsLimited, $studentsOrder);

    $response = array('data' => $result);
    echo json_encode($response);
  } elseif ($action == 'search-student_Data') {
    $searchRollNum = $_POST['searchRollNum'];
    $searchName = $_POST['searchName'];
    $searchPhone = $_POST['searchPhone'];
    $searchDate = $_POST['searchDate'];

    $result = search_students_data_in_database($searchRollNum, $searchName, $searchPhone, $searchDate);

    $response = array('data' => $result);
    echo json_encode($response);
  }

  // filter dokan-details 
  if ($action == 'load-dokan-Data') {
    $dokanLimited = $_POST['dokanLimited'];
    $dokanOrder = $_POST['dokanOrder'];

    $result = filter_dokan_data_in_database($dokanLimited, $dokanOrder);

    $response = array('data' => $result);
    echo json_encode($response);
  }

  // filter dokan-details 
  if ($action == 'search-dokan_Data') {
    $searchName = $_POST['searchName'];
    $searchType = $_POST['searchType'];

    $result = search_dokan_data_in_database($searchName, $searchType);

    $response = array('data' => $result);
    echo json_encode($response);
  }

  // filter dokan-rent-details 
  if ($action == 'load-dokan_rent-Data') {
    $dokanRentLimited = $_POST['dokanRentLimited'];
    $dokanRentOrder = $_POST['dokanRentOrder'];

    $result = filter_dokan_rent_data_in_database($dokanRentLimited, $dokanRentOrder);

    $response = array('data' => $result);
    echo json_encode($response);
  }

  // filter dokan-rent-details 
  if ($action == 'search-dokan_rent-Data') {
    $searchRentName = $_POST['searchRentName'];
    $searchRentType = $_POST['searchRentType'];
    $searchRentMonth = $_POST['searchRentMonth'];

    $result = search_dokan_rent_data_in_database($searchRentName, $searchRentType, $searchRentMonth);

    $response = array('data' => $result);
    echo json_encode($response);
  }

  // filter dokan-rent-details 
  if ($action == 'load-st_fees-Data') {
    $stFeesLimited = $_POST['stFeesLimited'];
    $stFeesOrder = $_POST['stFeesOrder'];

    $result = filter_st_fees_data_in_database($stFeesLimited, $stFeesOrder);

    $response = array('data' => $result);
    echo json_encode($response);
  }

  // filter dokan-rent-details 
  if ($action == 'search-st_fees-Data') {
    $searchStFeesRegis = $_POST['searchStFeesRegis'];
    $searchStFeesName = $_POST['searchStFeesName'];
    $searchStFeesMonth = $_POST['searchStFeesMonth'];

    $result = search_st_fees_data_in_database($searchStFeesRegis, $searchStFeesName, $searchStFeesMonth);

    $response = array('data' => $result);
    echo json_encode($response);
  }
}
