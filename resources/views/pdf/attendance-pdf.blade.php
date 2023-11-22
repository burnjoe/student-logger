<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">

<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-15" />
   <style>
      /* Font Style */
      @page {
         font-family: Arial, sans-serif;
         margin: 1em 6em 1em 6em;
         size: letter;
      }

      body {
         margin: 5em 0;
      }

      /* Header */
      #header {
         display: flex;
         flex-direction: column;
         text-align: center;
         position: fixed;
         top: 0;
         left: 0;
         right: 0;
      }

      #header .main-name {
         font-weight: bold;
         font-size: 25px;
         line-height: 90%;
         color: rgb(0, 51, 0);
      }

      #header .label-name {
         font-weight: medium;
         font-size: 12px;
      }

      #header .sub-name {
         font-weight: medium;
         font-size: 14px;
         line-height: 90%;
      }

      #header .office {
         font-weight: bolder;
         font-style: italic;
         font-size: 14px;
         line-height: 90%;
      }

      #header .address {
         line-height: 90%;
         font-size: 10px;
      }

      #header .logo {
         position: fixed;
         top: 0;
         right: 480px;
      }

      /* Footer */
      #footer {
         position: fixed;
         bottom: 0;
         left: 0;
         right: 0;
         text-align: center;
      }

      .title {
         display: flex;
         flex-direction: column;
         text-align: center;
         margin-top: 15px;
         font-weight: bold;
         font-size: 14px;
      }

      .start-date,
      .end-date {
         text-decoration: underline;
      }

      /* Table */
      .table {
         text-align: center;
         margin-top: 20px;
         font-size: 13px;
         display: flex;
      }

      table {
         border-collapse: collapse;
         margin: 0 auto;
         width: 100%;
      }

      table th,
      td {
         text-align: center;
         padding-left: 10px;
         padding-right: 10px;
         border: 0.5pt solid black;
      }

      /* Signature */
      .signature {
         margin-top: 20px;
         display: flex;
         flex-direction: column;
         font-size: 12px;
      }

      .signature .name {
         font-weight: Bold;
      }

      .signature .rl {
         font-weight: Bold;
      }

      .signature .checked,
      .noted {
         margin-top: 20px;
      }
   </style>
   <title>Library Reports</title>
</head>

<body>
   <!-- Header -->
   <div id="header">
      <div class="logo">
         <img src="{{ public_path('img/pnc_logo.png') }}" style="width: 50%; height: auto" />
      </div>
      <div class="label-name">Republic of the Philippines</div>
      <div class="main-name">University of Cabuyao</div>
      <div class="sub-name">(Pamantasan ng Cabuyao)</div>
      <!-- need info PMGSD? -->
      <div class="office">Office of the University Library</div>
      <div class="address">Katapatan Mutual Homes, Brgy. Banay-banay, City of Cabuyao, Laguna, Phillipines 4025</div>
   </div>

   <!-- Footer -->
   <div id="footer">
      <img src="{{ public_path('img/pnc_footer.png') }}" style="width: 18%; height: auto" />
   </div>

   <!-- First Page -->
   <div>
      <div class="title">
         <div class="page-title">ATTENDANCE REPORT</div>
         <div>From <span class="start-date">Nov. 05, 2023</span> to <span class="end-date">Nov. 05, 2023</span></div>
      </div>

      <div class="table">
         <table>
            <thead>
               <tr>
                  <th>Student No.</th>
                  <th>Last Name</th>
                  <th>First Name</th>
                  <th>Date</th>
                  <th>Log In</th>
                  <th>Log Out</th>
                  <th>Status</th>
                  <th>Post</th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td>2000541</td>
                  <td>Ferreras</td>
                  <td>Vince Austin</td>
                  <td>Nov. 05, 2023</td>
                  <td>05:05 PM</td>
                  <td>10:05 PM</td>
                  <td>Out</td>
                  <td>Clinic</td>
               </tr>
            </tbody>
         </table>
      </div>
   </div>
</body>

</html>
