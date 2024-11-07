 <?php
  include_once('../../conn.php');
  include_once('../../functions.php');
  include_once('header.php');
  ?>
 <h2>DATA ANALYTICS</h2>
 <table class="students-table">
   <thead>
     <tr>
       <th>Student Name</th>
       <th>Evaluation Status</th>
       <th>Evaluation Feedback</th>
     </tr>
   </thead>
   <tbody>
     <tr>
       <td>Last Name, First Name M.</td>
       <td><a href="#" class="btn-link" data-bs-toggle="modal" data-bs-target="#viewStatusModal">View</a></td>
       <td><a href="#" class="btn-link" data-bs-toggle="modal" data-bs-target="#viewFeedbackModal">View</a></td>
   </tbody>
 </table>

 <!-- Feedback Modal -->
 <div class="modal fade" id="viewFeedbackModal" tabindex="-1" aria-labelledby="viewFeedbackModal" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="viewFeedbackModal">Evaluation Feedback</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">

         <!-- Message Box for Input -->
         <div class="mb-3">
           <label for="studentMessage" class="form-label">Add a Message:</label>
           <textarea id="studentMessage" class="form-control" rows="3" placeholder="Type your message here..."></textarea>
         </div>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
         <button type="button" class="btn btn-primary" id="saveStatusButton">Save</button>
       </div>
     </div>
   </div>
 </div>

 <!-- Evaluation Status Modal -->
 <div class="modal fade" id="viewStatusModal" tabindex="-1" aria-labelledby="viewStatusModal" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="viewStatusModal">Student Evaluation Status</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">
         <!-- Dropdown for Evaluation Status -->
         <div class="mb-3">
           <label for="evaluationStatus" class="form-label">Select Evaluation Status:</label>
           <select id="evaluationStatus" class="form-select">
             <option value="evaluated">Evaluated</option>
             <option value="incomplete">Incomplete</option>
           </select>
         </div>
         <!-- Additional content can go here -->
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
         <button type="button" class="btn btn-primary" id="saveStatusButton">Save</button>
       </div>
     </div>
   </div>
 </div>
 <?php include_once('footer.php') ?>