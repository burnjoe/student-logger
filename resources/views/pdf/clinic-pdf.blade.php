<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">

<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-15" />
   <style>
      /* Font Style */
      body {
         font-family: Arial, sans-serif;
         margin: -2em 2em -2em 2em;
      }

      /* Header */
      .header {
         display: flex;
         flex-direction: column;
         text-align: center;
      }

      .header .main-name {
         font-weight: bold;
         font-size: 22px;
         color: rgb(0, 51, 0);
      }

      .header .label-name {
         font-size: 11px;
      }

      .header .sub-name {
         font-size: 11px;
      }

      .header .office {
         font-weight: bold;
         font-style: italic;
         font-size: 11px;
      }

      .header .address {
         font-size: 10px;
      }

      /* Footer */
      .footer {
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
         margin-top: 20px;
         font-weight: bold;
         font-size: 10px;
      }

      /* Chart */
      .chart {
         text-align: center;
         margin-top: 10px;
      }

      /* Table */
      .table {
         text-align: center;
         margin-top: 20px;
         font-size: 11px;
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
         margin-top: 20px;
         font-size: 9px;
      }

      /* Signature */
      .signature {
         margin-top: 20px;
         display: flex;
         flex-direction: column;
         font-size: 9px;
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
   <title>Clinic Report</title>
</head>

<body>
   <!-- First Page - Pie Chart -->
   <div class="section1">
      <div class="header">
         <div class="label-name">Republic of the Philippines</div>
         <div class="main-name">University of Cabuyao</div>
         <div class="sub-name">(Pamantasan ng Cabuyao)</div>
         <div class="office">University of Health Department</div>
         <div class="address">Katapatan Mutual Homes, Brgy. Banay-banay, Cabuyao City, Laguna 4025</div>
      </div>

      <div class="title">
         <div class="page-title">STUDENTS CLINIC ATTENDANCE</div>
         <div><span class="month">NOVEMBER</span></div>
         <div><span class="semester">1ST SEMESTER AY 2023-2024</span></div>
      </div>

      <div class="chart">
         <p>[Chart]</p>
      </div>

      <div class="summary">
         <p style="text-indent: 20px">
            The graph shows that <span class="">SHS</span> has the greatest number of students who visited the
            clinic onsite while the <span class="">CCS</span> has the least number of students. Overall, <span
               class="">62%</span> of the total student’s population visited the clinic onsite during the
            month of <span class="">MAY</span> <span>2023</span>.
         </p>

         <p>
            <span class="">COED</span> – <span class="">44%</span>; <span class="">CBAA</span> – <span
               class="">69%</span>; <span class="">COE</span> – <span class="">59%</span>; <span
               class="">CHAS</span> – <span class="">88%</span>; <span class="">CAS</span> – <span
               class="">77%</span>;
            <span class="">CCS</span> – <span class="">24%</span>; <span class="">SHS</span> – <span
               class="">73%</span>
         </p>
      </div>

      <div class="signature">
         <!-- prepared by -->
         <div class="prepared">
            <p>Prepared by:</p>
            <br />
            <div>
               {{-- need info --}}
               <span class="name">Hazel B. Dile</span>
               <br />
               {{-- need info --}}
               <span class="position">Library Support Staff</span>
            </div>
         </div>

         <!-- checked by-->
         <div class="checked">
            <p>Checked by:</p>
            <br />
            <div>
               {{-- need info --}}
               <span class="name">Juanita B. Cuizon,</span> <span class="rl">RL</span>
               <br />
               {{-- need info --}}
               <span>Circulation Librarian</span>
            </div>
         </div>

         <!-- noted by -->
         <div class="noted">
            <p>Noted by:</p>
            <br />
            <div>
               {{-- need info --}}
               <span class="name">Mariquit M. Redrasa,</span> <span class="rl">RL</span>
               <br />
               {{-- need info --}}
               <span class="position">University Librarian</span>
            </div>
         </div>
      </div>

      <div class="footer">
         <img src="{{ public_path('public/img/pnc_footer.png') }}" />
      </div>
   </div>

   <!-- Second Page - Top Users -->
   <div class="section2">
      <div class="header" style="page-break-before: always">
         <div class="label-name">Republic of the Philippines</div>
         <div class="main-name">University of Cabuyao</div>
         <div class="sub-name">(Pamantasan ng Cabuyao)</div>
         <div class="office">University of Health Department</div>
         <div class="address">Katapatan Mutual Homes, Brgy. Banay-banay, Cabuyao City, Laguna 4025</div>
      </div>

      <div class="title">
         <div class="page-title">TOP USERS IN CLINIC</div>
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

      <div class="signature">
         <!-- prepared by -->
         <div class="prepared">
            <p>Prepared by:</p>
            <br />
            <div>
               {{-- need info --}}
               <span class="name">Hazel B. Dile</span>
               <br />
               {{-- need info --}}
               <span class="position">Library Support Staff</span>
            </div>
         </div>

         <!-- checked by-->
         <div class="checked">
            <p>Checked by:</p>
            <br />
            <div>
               {{-- need info --}}
               <span class="name">Juanita B. Cuizon,</span> <span class="rl">RL</span>
               <br />
               {{-- need info --}}
               <span>Circulation Librarian</span>
            </div>
         </div>

         <!-- noted by -->
         <div class="noted">
            <p>Noted by:</p>
            <br />
            <div>
               {{-- need info --}}
               <span class="name">Mariquit M. Redrasa,</span> <span class="rl">RL</span>
               <br />
               {{-- need info --}}
               <span class="position">University Librarian</span>
            </div>
         </div>
      </div>

      <div class="footer">
         <img src="{{ public_path('img/pnc_footer.png') }}" />
      </div>
   </div>
</body>

</html>
