<?php
session_start();
include_once('../includes/config.php');

function filter_students_data_in_database($studentsLimited, $studentsOrder)
{
  global $conn;

  // Modify the query based on your database structure
  $students_query = "SELECT * FROM `students`
    ORDER BY `id` $studentsOrder LIMIT $studentsLimited";

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
      $data .= '<a href="st-profile.php?st_view_profile=' . $students['id'] . '" class="text-info ms-1"><i class="ti ti-eye fs-6"></i></a>';
    }
    if ($students['status'] !== 'غیر فعال') {
      $data .= '<a href="st-admission-edit.php?st_edit=' . $students['id'] . '" class="text-success"><i class="ti ti-edit fs-6"></i></a>';
    }
    if ($students['status'] !== 'غیر فعال') {
      $data .= '
              <button type="button" class="border-0  rounded-2 p-0 py-1 bg-white" data-bs-toggle="modal" data-bs-target="#deleteModal' . $students['id'] . '">
              <span><i class="fs-5 ti ti-trash  text-danger p-1 "></i></span>
            </button>';
    }
    $data .= ' <div class="modal fade" id="deleteModal' . $students['id'] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">یقینی طور پر حذف کر رہے ہیں؟ </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">کلوز</button>
                    <a href="code2.php?st_delete=' . $students['id'] . '">
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
      $data .= '<a href="st-profile.php?st_view_profile=' . $search['id'] . '" class="text-info ms-1"><i class="ti ti-eye fs-6"></i></a>';
    }
    if ($search['status'] !== 'غیر فعال') {
      $data .= '<a href="st-admission-edit.php?st_edit=' . $search['id'] . '" class="text-success"><i class="ti ti-edit fs-6"></i></a>';
    }
    if ($search['status'] !== 'غیر فعال') {
      $data .= '
          <button type="button" class="border-0  rounded-2 p-0 py-1 bg-white" data-bs-toggle="modal" data-bs-target="#deleteModal' . $search['id'] . '">
          <span><i class="fs-5 ti ti-trash  text-danger p-1 "></i></span>
        </button>';
    }
    $data .= ' <div class="modal fade" id="deleteModal' . $search['id'] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">یقینی طور پر حذف کر رہے ہیں؟ </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">کلوز</button>
                <a href="code2.php?st_delete=' . $search['id'] . '">
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
                <td colspan="7" class="fw-semibold bg-light-warning text-warning text-center">There are no matching data from database. '.$searchRollNum.''.$searchName.''.$searchPhone.''.$searchDate.' </td>
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
}
