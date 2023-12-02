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

      /* Page Break */
      hr {
         page-break-after: always;
         border: 0;
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

      /* Title */
      .title {
         display: flex;
         flex-direction: column;
         text-align: center;
         margin-top: 15px;
         font-weight: bold;
         font-size: 14px;
      }

      /* Chart */
      .chart {
         text-align: center;
         margin-top: 15px;
      }

      /* Table */
      .table {
         text-align: center;
         margin-top: 30px;
         font-size: 13px;
      }
      table {
         border-collapse: collapse;
         margin: 0 auto;
      }
      table th,
      td {
         text-align: center;
         padding-left: 15px;
         padding-right: 15px;
         border: 0.5pt solid black;
      }

      /* Summary */
      .summary {
         text-align: justify;
         margin-top: 15px;
         font-size: 12px;
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
   <title>Clinic Reports</title>
</head>

<body>
   {{-- Header --}}
   <div id="header">
      <div class="logo">
         <img src="{{ public_path('img/pnc_logo.png') }}" style="width: 50%; height: auto;" />
      </div>
      <div class="label-name">Republic of the Philippines</div>
      <div class="main-name">University of Cabuyao</div>
      <div class="sub-name">(Pamantasan ng Cabuyao)</div>
      <div class="office">University Health Services Department</div>
      <div class="address">Katapatan Mutual Homes, Brgy. Banay-banay, City of Cabuyao, Laguna, Phillipines 4025</div>
   </div>

   {{-- Footer --}}
   <div id="footer">
      <img src="{{ public_path('img/pnc_footer.png') }}" style="width: 18%; height: auto;" />
   </div>

   <!-- First Page - Pie Chart -->
   <div>
      <div class="title">
         <div class="page-title">STUDENTS CLINIC ATTENDANCE</div>
         <div><span class="month">NOVEMBER</span></div>
         <div><span class="semester">1ST SEMESTER AY 2023-2024</span></div>
      </div>

      <div class="chart">
         <img src="{{ $imageUrl }}" alt="Clinic Chart">
      </div>

      <div class="summary">
         <p style="text-indent: 20px">
            The graph shows that <span class="">CHAS</span> has the greatest number of students who visited the
            clinic onsite while the <span class="">CCS</span> has the least number of students. Overall, <span
               class="">62%</span> of the total student’s population visited the clinic onsite during the
            month of <span class="">MAY</span> <span>2023</span>.
         </p>

         <p>
            <span class="">COED</span> – <span class="">44%</span>; <span class="">CBAA</span> – <span
               class="">69%</span>; <span class="">COE</span> – <span class="">59%</span>; <span
               class="">CHAS</span> – <span class="">88%</span>; <span class="">CAS</span> – <span
               class="">77%</span>;
            <span class="">CCS</span> – <span class="">24%</span>
         </p>
      </div>

      {{-- need new info for clinic --}}
      <div class="signature">
         <!-- prepared by (NEED INFO) -->
         <div class="prepared">
            <p>Prepared by:</p>
            <br />
            <div>
               <span class="name">Hazel B. Dile</span>
               <br />
               <span class="position">Library Support Staff</span>
            </div>
         </div>

         <!-- checked by (NEED INFO) -->
         <div class="checked">
            <p>Checked by:</p>
            <br />
            <div>
               <span class="name">Juanita B. Cuizon,</span> <span class="rl">RL</span>
               <br />
               <span>Circulation Librarian</span>
            </div>
         </div>

         <!-- noted by (NEED INFO) -->
         <div class="noted">
            <p>Noted by:</p>
            <br />
            <div>
               <span class="name">Mariquit M. Redrasa,</span> <span class="rl">RL</span>
               <br />
               <span class="position">University Librarian</span>
            </div>
         </div>
      </div>
   </div>

   {{-- Page Break --}}
   <hr/>

   <!-- Second Page - Top Users -->
   <div>
      <div class="title">
         <div class="page-title">TOP USERS IN CLINC</div>
         <div><span class="month">NOVEMBER</span></div>
         <div><span class="semester">1ST SEMESTER AY 2023-2024</span></div>
      </div>

      <div class="table">
         <table>
            <thead>
               <tr>
                  <th>Name</th>
                  <th>Frequency of Visit</th>
                  <th>College</th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td>Ferreras, Vince Austin R.</td>
                  <td>7</td>
                  <td>CCS</td>
               </tr>
               <tr>
                  <td>Sabana, Joe Lawrence M.</td>
                  <td>7</td>
                  <td>CHAS</td>
               </tr>
               <tr>
                  <td>Derla, Julius A.</td>
                  <td>4</td>
                  <td>COE</td>
               </tr>
               <tr>
                  <td>Asenjo, Dan Dowee A.</td>
                  <td>3</td>
                  <td>CHAS</td>
               </tr>
               <tr>
                  <td>De La Cruz, Juan K.</td>
                  <td>2</td>
                  <td>CCS</td>
               </tr>
            </tbody>
         </table>
      </div>

      {{-- need new info for clinic --}}
      <div class="signature">
         <!-- prepared by (NEED INFO) -->
         <div class="prepared">
            <p>Prepared by:</p>
            <br />
            <div>
               <span class="name">Hazel B. Dile</span>
               <br />
               <span class="position">Library Support Staff</span>
            </div>
         </div>

         <!-- checked by (NEED INFO) -->
         <div class="checked">
            <p>Checked by:</p>
            <br />
            <div>
               <span class="name">Juanita B. Cuizon,</span> <span class="rl">RL</span>
               <br />
               <span>Circulation Librarian</span>
            </div>
         </div>

         <!-- noted by (NEED INFO) -->
         <div class="noted">
            <p>Noted by:</p>
            <br />
            <div>
               <span class="name">Mariquit M. Redrasa,</span> <span class="rl">RL</span>
               <br />
               <span class="position">University Librarian</span>
            </div>
         </div>
      </div>
   </div>
</body>

</html>