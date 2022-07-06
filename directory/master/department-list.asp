<!--#include file = "../includes/db_connect.inc"-->
<%
	//Define the variables used locally within this page
	Dim DepartmentSql
	Dim DepartmentRs
	//Select the department name
   	DepartmentSql = "SELECT * FROM DepartmentList ORDER BY DepartmentName"
    // Execute the above SQL statement
    Set DepartmentRs = accessConn.execute(DepartmentSql)
%>
	<!--
<div class="panel panel-default effect1">
        <div class="panel-heading" style="">
            <h3 class="panel-title">Directory Views</h3>
		</div>
        <div class="panel-body" style="padding:15px; margin:0;">
		-->
	<!-- Nav tabs -->
	<ul class="nav nav-tabs">
		<li class="active">
			<a href="#people-tab" data-toggle="tab" title="Search for people by name">People</a>
		</li>
		<li>
			<a href="#home4" data-toggle="tab" title="Find people by department">Department</a>
		</li>
		
	</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="people-tab">
			<div class="panel-body">
				<p>Search for faculty and staff</p>
				<form name="search_form" method="GET" action="master-search.asp" class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-3 control-label">First Name</label>
						<div class="col-sm-8">
							<input type="text" name="strFirstName" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Last Name</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="strLastName">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label"></label>
						<div class="col-sm-8">
							<button type="submit" value="Search" name="btnSubmit" class="btn btn-primary " style="width:95%">Search</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="tab-pane" id="home4">
			<div class="panel-body">
				<p>View faculty and staff by department</p>
				<form name="search_form" method="post" action="master-search.asp?btnSubmit=Search">
					<select onchange="this.form.submit()" name="strDepartment" id="strDepartment" class="strDepartment js-example-responsive"
					    style="width: 100%">
						<option value="1">Select Department--- </option>

						<%
    		Do While Not DepartmentRs.EOF
    			%>
    			<option value="<%=DepartmentRs("DepartmentID")%>"><%=DepartmentRs("DepartmentName")%> </option>
    			<%
      			DepartmentRs.movenext
    		Loop
		%>
		<!--
						<option value="192">5 Corners CHWK </option>
						<option value="169">Academic Integrity and Appeals </option>
						<option value="105">Academic Success Centre </option>
						<option value="15">Adult Education </option>
						<option value="188">Advising Centre </option>
						<option value="195">Agricultural Centre of Excellence </option>
						<option value="8">Agriculture </option>
						<option value="125">Amnesty International </option>
						<option value="196">Ancillary Services </option>
						<option value="10">Applied Business Technology </option>
						<option value="12">Assessment Services </option>
						<option value="120">Athletics </option>
						<option value="14">Aviation </option>
						<option value="182">BFA Advice </option>
						<option value="17">Biology </option>
						<option value="18">Bookstore </option>
						<option value="165">Campus Card Office</option>
						<option value="185">Campus Planning and Resource Development </option>
						<option value="33">Career Centre </option>
						<option value="122">Cascade </option>
						<option value="144">Centre for Education and Research on Ageing </option>
						<option value="163">Centre for Social Research </option>
						<option value="23">Chemistry </option>
						<option value="171">Chief Financial Office and Vice President, Administration </option>
						<option value="37">Child, Youth & Family Studies </option>
						<option value="127">CISSA </option>
						<option value="146">CIVL Radio </option>
						<option value="11">College of Arts </option>
						<option value="25">Communications </option>
						<option value="159">Community Literacy </option>
						<option value="29">Computer Information Systems </option>
						<option value="194">Conference Services </option>
						<option value="31">Continuing Education </option>
						<option value="34">Criminology and Criminal Justice </option>
						<option value="142">Critical Analysis & Study Methods </option>
						<option value="86">Dana Hospitality </option>
						<option value="4">Disability Resource Centre </option>
						<option value="38">Economics </option>
						<option value="57">Educational Technology Services </option>
						<option value="39">Eldercollege </option>
						<option value="41">Engineering </option>
						<option value="42">English </option>
						<option value="43">English as a Second Language </option>
						<option value="189">Envision Athletic Centre </option>
						<option value="44">Facilities </option>
						<option value="45">Faculty & Staff Association </option>
						<option value="162">Faculty of Access and Continuing Education </option>
						<option value="95">Faculty of Applied and Technical Studies </option>
						<option value="179">Faculty of Health Sciences </option>
						<option value="150">Faculty of Professional Studies </option>
						<option value="81">Faculty of Science </option>
						<option value="46">Faculty Services </option>
						<option value="48">Fashion Design </option>
						<option value="132">Fax Machines </option>
						<option value="49">Finance & Administration </option>
						<option value="177">First Aid </option>
						<option value="51">Geography and the Environment </option>
						<option value="164">Global Development Institute </option>
						<option value="183">Graphic & Digital Design </option>
						<option value="54">History </option>
						<option value="154">Hope Campus </option>
						<option value="199">Housing Operations </option>
						<option value="40">Human Resources </option>
						<option value="30">Human Rights & Conflict Resolution Office </option>
						<option value="174">Indigenous Affairs Office </option>
						<option value="2">Indigenous Student Centre </option>
						<option value="55">Information Technology Services </option>
						<option value="56">Institutional Research and Integrated Planning </option>
						<option value="58">International Education </option>
						<option value="61">Kinesiology </option>
						<option value="63">Library </option>
						<option value="64">Library & Information Technology </option>
						<option value="65">Mathematics & Statistics </option>
						<option value="187">Meeting Rooms </option>
						<option value="178">Mennonite Studies </option>
						<option value="67">Mission Campus </option>
						<option value="68">Modern Languages </option>
						<option value="147">Music </option>
						<option value="6">Office of the Registrar </option>
						<option value="73">Parking Services </option>
						<option value="197">Peace & Conflict Studies </option>
						<option value="74">Philosophy </option>
						<option value="75">Physics </option>
						<option value="190">Political Science </option>
						<option value="76">Presidents Office </option>
						<option value="131">Pride Network </option>
						<option value="167">Print Services </option>
						<option value="198">Program Development & Quality Assurance </option>
						<option value="175">Program Reviews Office </option>
						<option value="103">Provost & Vice President, Academic </option>
						<option value="78">Psychology </option>
						<option value="166">Purchasing </option>
						<option value="79">Research, Engagement & Graduate Studies </option>
						<option value="19">School of Business </option>
						<option value="53">School of Health Studies </option>
						<option value="84">School of Social Work & Human Services </option>
						<option value="180">Secretariat </option>
						<option value="21">Security & Emergency Management </option>
						<option value="117">Senate </option>
						<option value="168">Shipping/Receiving/Mail </option>
						<option value="83">Social Cultural & Media Studies </option>
						<option value="134">South Asian Studies Institute </option>
						<option value="89">Student Services </option>
						<option value="91">Student Union Society </option>
						<option value="130">Teacher Education </option>
						<option value="158">Teaching & Learning </option>
						<option value="94">Theatre </option>
						<option value="96">UFV Board of Governors </option>
						<option value="133">UFV Centre for Safe Schools and Communities </option>
						<option value="113">UFV Foundation </option>
						<option value="186">UFV India </option>
						<option value="191">University Relations </option>
						<option value="24">Upgrading and University Preparation </option>
						<option value="172">Vice President, Students </option>
						<option value="181">Vice-Provost </option>
						<option value="104">Visual Arts </option>

					-->
						<input type="submit" value="Search" name="btnSubmit" style="display:none">
				</form>
			</div>
		</div>
		<div class="tab-pane" id="print-tab">
			<div class="panel-body">
				<P>View complete listings: (opens in new window)</P>
				<ul>
					<li>
						<a href="https://www.ufv.ca/directory/a.htm" target="_blank" rel="nofollow">Alphabetical Listing</a>
					</li>
					<li>
						<a href="https://www.ufv.ca/directory/dept_a.htm" target="_blank" rel="nofollow">Department Listings</a>
					</li>
				</ul>
				<p>Print Lists</p>
				<ul>
					<li>
					<a href="https://www.ufv.ca/directory/PrintAlpha.htm" target="_blank" rel="nofollow">Alphabetical list</a>
					</li>
					<li>
					<a href="https://www.ufv.ca/directory/PrintDept.htm" target="_blank" rel="nofollow">Department list</a>
					</li>
					
				</ul>
			</div>
		</div>
		<!--	
</div>
</div>     
-->
		<%
DepartmentRs.Close
accessConn.Close
Set DepartmentRs=nothing
Set accessConn=nothing
%>