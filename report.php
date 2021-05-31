<?php


include 'php/includes/header.php';
if (!isset($_SESSION['email'])) {
  Header('Location:logout.php');
}
?>
<div class="container" id="wrapper">
  <div id="header">
    <div class="mainLogo">
      <div class="logo"><img src="assets/images/lg.png" width="60px" height="50px" /> Crime <span> reporter</span></div>
    </div>
    <div id="login">
      <?php if (isset($_SESSION['email'])) { ?>
        <div class="div1">
          <img src="assets/images/lock-open.png" style="position: relative; top: 3px;"> &nbsp; You are logged in as: <b><?php echo $_SESSION['email']; ?></b>
        </div>
      <?php } else { ?>
        <a href="login.php">Login</a> | <a href="register.php">Register</a>
      <?php } ?>
    </div>
  </div>
  <div id="nav">
    <?php include 'php/includes/navigation.php' ?>
  </div>
  <div id="main">
    <div class="row">
      <div class="col-sm-3" id="side_menu3">
        <ul id="side_menu">
          <li id="r_crime"><a href="">General Crime Form</a></li>
          <li class="collapsible"><a href="" id="persons">Missing/Found Persons </a>
            <ul>
              <li><a href="" id="person_missing">Missing Person Form</a></li>
              <li><a href="" id="person_found">Person Found Form</a></li>
            </ul>
          </li>
          <li class="collapsible"><a href="" id="vehicles">Missing/Found Vehicles </a>
            <ul>
              <li><a href="" id="vehicle_missing">Missing Vehicle Form</a></li>
              <li><a href="" id="vehicle_found">Vehicle Found Form</a></li>
            </ul>
          </li>
          <li id="lost-found"><a href="">Lost Items</a></li>
        </ul>

      </div>
      <div class="col-sm-8">
        <div class="col-lg-12">
          <div class="well" id="item_display">

            <form class="bs-example form-horizontal" method="post" action="" id="items" class="forms">
              <fieldset>
                <legend>Report Lost/Found Item:</legend>
                <div id="crime"></div>
                <table>
                  <tr>
                    <td width="50%">
                      <div class="form-group">
                        <label for="item_name" class="col-lg-4 control-label">Item Name</label>
                        <div class="col-lg-8">
                          <input class="form-control" id="item_name" name="item_name" placeholder="Item Name" type="text" required min="3" title="At least 3 characters" />
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="form-group">
                        <label for="category" class="col-lg-4 control-label">Category</label>
                        <div class="col-lg-8">
                          <select class="form-control" id="category" name="category" title="Please select Category!" required>
                            <option value="">-- select --</option>
                            <option value="Lost">Lost</option>
                            <option value="found">Found</option>
                          </select>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td width="50%">
                      <div class="form-group">
                        <label for="last_seen" class="col-lg-4 control-label">Last Seen</label>
                        <div class="col-lg-8">
                          <input class="form-control" id="last_seen" title="Date required" name="last_seen" type="date" required />

                        </div>
                      </div>
                    </td>
                    <td></td>
                  </tr>
                  <tr>
                    <td colspan="2">
                      <div class="form-group">
                        <label for="item_description" class="col-lg-2 control-label">Item Description:</label>
                        <div class="col-lg-10">
                          <textarea class="form-control" rows="3" id="item_description" min="5" required name="item_description"></textarea>

                        </div>
                      </div>
                    </td>
                  </tr>
                </table>

                <div class="form-group">
                  <div class="col-lg-10 col-lg-offset-2">
                    <button type="submit" class="btn btn-primary pull-right" id="lost_found" style="padding:5px 7px;font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;">Report</button>
                  </div>
                </div>
              </fieldset>
            </form>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="well" id="m_person_form_display">
            <form class="bs-example form-horizontal" method="post" action="file_handler.php" id="m_person_form" enctype="multipart/form-data">
              <fieldset>
                <legend>Missing Person:</legend>
                <div id="crime"></div>
                <table>
                  <tr>
                    <td valign="top" width="50%">
                      <div class="form-group">
                        <label for="full_names" class="col-lg-4 control-label">Full Names</label>
                        <div class="col-lg-6">
                          <input class="form-control" id="full_names" name="full_names" placeholder="Full Names" type="text" required min="3" title="At least 3 characters" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="address" class="col-lg-4 control-label">Address</label>
                        <div class="col-lg-6">
                          <input class="form-control" id="address" name="address" placeholder="Address" type="text" required min="3" title="At least 3 characters" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="phone_number" class="col-lg-4 control-label">Phone Number</label>
                        <div class="col-lg-6">
                          <input class="form-control" id="phone_number" title="" name="phone_number" type="number" required />
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="form-group">
                        <label for="last_seen2" class="col-lg-4 control-label">Last Seen</label>
                        <div class="col-lg-7">
                          <input class="form-control" id="last_seen2" title="Date required" name="last_seen2" type="date" required />

                        </div>
                      </div>
                      <div class="form-group">
                        <label for="image" class="col-lg-3 control-label">Image:</label>
                        <div class="col-lg-8">
                          <input title="Date required" name="missing_image" type="file" required />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="item_description" class="col-lg-3 control-label">Description:</label>
                        <div class="col-lg-8">
                          <textarea class="form-control" rows="3" id="item_description" min="5" required name="item_description"></textarea>

                        </div>
                      </div>
                    </td>
                  </tr>
                </table>
                <div class="form-group">
                  <div class="col-lg-10 col-lg-offset-2">
                    <button type="submit" name="missing_person" class="btn btn-primary pull-right" id="missing_person" style="padding:5px 7px;font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;">Report</button>
                  </div>
                </div>
              </fieldset>
            </form>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="well" id="p_found_form_display">
            <form class="bs-example form-horizontal" method="post" action="file_handler.php" id="p_found_form" enctype="multipart/form-data">
              <fieldset>
                <legend>Missing Person Found:</legend>
                <div id="crime"></div>
                <table>
                  <tr>
                    <td width="50%">
                      <div class="form-group">
                        <label for="full_names1" class="col-lg-4 control-label">Full Names</label>
                        <div class="col-lg-6">
                          <input class="form-control" id="full_names1" name="full_names1" placeholder="Full Names" type="text" required min="3" title="At least 3 characters" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="location_seen" class="col-lg-4 control-label">Location Seen</label>
                        <div class="col-lg-6">
                          <input class="form-control" id="location_seen" name="location_seen" placeholder="Location Seen" type="text" required min="3" title="At least 3 characters" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="phone_number" class="col-lg-4 control-label">Your Phone Number</label>
                        <div class="col-lg-6">
                          <input class="form-control" id="phone_number" name="phone_number" type="number" required />
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="form-group">
                        <label for="image" class="col-lg-4 control-label">Upload Image:</label>
                        <div class="col-lg-6">
                          <input id="image" title="Date required" name="found_image" type="file" required />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="item_description" class="col-lg-3 control-label">Description:</label>
                        <div class="col-lg-8">
                          <textarea class="form-control" rows="3" id="item_description" min="5" required name="person_description"></textarea>

                        </div>
                      </div>
                    </td>
                  </tr>
                </table>
                <div class="form-group">
                  <div class="col-lg-10 col-lg-offset-2">
                    <button type="submit" class="btn btn-primary pull-right" id="missing_person_found" name="missing_person_found" style="padding:5px 7px;font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;">Report</button>
                  </div>
                </div>
              </fieldset>
            </form>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="well" id="m_vehicle_form_display">
            <form class="bs-example form-horizontal" method="post" action="file_handler.php" id="m_vehicle_form" enctype="multipart/form-data">
              <fieldset>
                <legend>Missing Vehicle:</legend>
                <div id="crime"></div>
                <table>
                  <tr>
                    <td width="50%">
                      <div class="form-group">
                        <label for="number_plate" class="col-lg-3 control-label">Number Plate</label>
                        <div class="col-lg-8">
                          <input class="form-control" id="number_plate" name="number_plate" placeholder="Number Plate" type="text" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="model" class="col-lg-3 control-label">Model</label>
                        <div class="col-lg-8">
                          <input class="form-control" id="model" name="model" placeholder="Model" type="text" required />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="owner_names" class="col-lg-3 control-label">Owner</label>
                        <div class="col-lg-8">
                          <input class="form-control" id="owner_names" name="owner_names" type="text" placeholder="Owner" required />
                        </div>
                      </div>
                    </td>
                    <td width="50%">
                      <div class="form-group">
                        <label for="phone_number1" class="col-lg-3 control-label">Phone Number</label>
                        <div class="col-lg-8">
                          <input class="form-control" id="phone_number1" name="phone_number1" type="number" required placeholder="Phone" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="id_number" class="col-lg-3 control-label">ID number</label>
                        <div class="col-lg-8">
                          <input class="form-control" id="id_number" name="id_number_o" type="number" required placeholder="ID number" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="image1" class="col-lg-3 control-label">Image:</label>
                        <div class="col-lg-8">
                          <input id="missing_vehicle_image" name="missing_vehicle_image" type="file" required />
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td width="50%">
                      <div class="form-group">
                        <label for="vehicle_description" class="col-lg-3 control-label">Description:</label>
                        <div class="col-lg-8">
                          <textarea class="form-control" rows="3" id="vehicle_description" min="5" required name="vehicle_description"></textarea>

                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                          <button type="submit" name="m_vehicle_submit" class="btn btn-primary pull-right" id="m_vehicle_submit" style="padding:5px 7px;font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;">Report</button>
                        </div>
                      </div>
                    </td>
                  </tr>
                </table>

              </fieldset>
            </form>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="well" id="f_vehicle_form_display">
            <form class="bs-example form-horizontal" method="post" action="file_handler.php" id="f_vehicle_form" enctype="multipart/form-data">
              <fieldset>
                <legend>Stollen Vehicle Found/Seen:</legend>
                <div id="crime"></div>
                <table>
                  <tr>
                    <td width="50%">
                      <div class="form-group">
                        <label for="number_plate" class="col-lg-3 control-label">Number Plate</label>
                        <div class="col-lg-8">
                          <input class="form-control" id="number_plate2" name="number_plate2" placeholder="Number Plate" type="text" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="model" class="col-lg-3 control-label">Model</label>
                        <div class="col-lg-8">
                          <input class="form-control" id="model2" name="model2" placeholder="Model" type="text" required />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="owner_names" class="col-lg-3 control-label">Location Seen</label>
                        <div class="col-lg-8">
                          <input class="form-control" id="location_seen" name="location_seen" type="date" required placeholder="Location Seen" />
                        </div>
                      </div>
                    </td>
                    <td width="50%">
                      <div class="form-group">
                        <label for="phone_number1" class="col-lg-3 control-label">Your Phone Number</label>
                        <div class="col-lg-8">
                          <input class="form-control" id="phone_number2" name="phone_number2" type="date" required placeholder="Phone Number" />
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="id_number" class="col-lg-3 control-label">ID number</label>
                        <div class="col-lg-8">
                          <input class="form-control" id="id_number2" name="id_number2" type="date" required placeholder="National ID" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="image1" class="col-lg-3 control-label">Image:</label>
                        <div class="col-lg-8">
                          <input id="f_vehicle_image" name="f_vehicle_image" type="file" required />
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td width="50%">
                      <div class="form-group">
                        <label for="vehicle_description" class="col-lg-3 control-label">Description:</label>
                        <div class="col-lg-8">
                          <textarea class="form-control" rows="3" id="vehicle_description2" min="5" required name="vehicle_description2"></textarea>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                          <button type="submit" class="btn btn-primary pull-right" name="f_vehicle_submit" id="found_vehicle" style="padding:5px 7px;font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;">Report</button>
                        </div>
                      </div>
                    </td>
                  </tr>
                </table>
              </fieldset>
            </form>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="well" id="report_crime_display">
            <form class="bs-example form-horizontal" method="post" action="" id="report_crime">

              <fieldset>
                <legend>General Crime Reporting Form:</legend>
                <div id="crime2"></div>
                <table>
                  <tr>
                    <td>
                      <div class="form-group">
                        <label for="crime_type" class="col-lg-2 control-label">Crime type:</label>
                        <div class="col-lg-7">
                          <input class="form-control" id="crime_type" placeholder="Crime Type" type="text" required name="crime_type">
                        </div>
                      </div>
                      <h3>Specify Location</h3>
                      <div class="form-group">
                        <label for="county" class="col-lg-2 control-label">County</label>
                        <div class="col-lg-7">
                          <input class="form-control" id="county" placeholder="County" type="text" required name="county">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="category" class="col-lg-2 control-label">Sub-County</label>
                        <div class="col-lg-7">
                          <input class="form-control" id="sub_county" placeholder="Sub County" type="text" required name="sub_county">
                        </div>
                      </div>
                    </td>
                    <td width="50%">
                      <div class="form-group">
                        <label for="street" class="col-lg-2 control-label">Street</label>
                        <div class="col-lg-7">
                          <input class="form-control" id="street" placeholder="Street" type="text" required name="street">
                          <span class="help-block">eg: along Ziwa Kitale road</span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="crime_description" class="col-lg-2 control-label">Crime Description:</label>
                        <div class="col-lg-8">
                          <textarea class="form-control" rows="3" id="crime_description" required name="crime_description"></textarea>

                        </div>
                      </div>
                    </td>
                  </tr>
                </table>


                <div class="form-group">
                  <div class="col-lg-10 col-lg-offset-2">
                    <button type="submit" class="btn btn-primary pull-right" id="report_c" style="padding:5px 7px;font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;">Report Crime</button>
                  </div>
                </div>
              </fieldset>
            </form>
          </div>
        </div>


      </div>
    </div>
  </div>
  <div class="clearer" style="height:3px;"></div>
  <?php include 'php/includes/footer.php'; ?>