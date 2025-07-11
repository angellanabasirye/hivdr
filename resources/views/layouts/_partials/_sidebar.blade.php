 
<!--<div class="sidebar" data-color="black" style="background-image: url('{{ asset('../assets/img/nhlds.jpg')}}');">-->
<!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

Tip 2: you can also add an image using data-image tag
-->
<div class="sidebar" data-color="black" data-image="../assets/img/nhlds.jpg">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="@{{route('dashboard.index')}}" class="simple-text logo-mini logoicon">
                <img src="../assets/img/coat-of-arms1.png" width="40" height="50"/>
            </a>
            <a href="@{{route('dashboard.index')}}" class="simple-text logo-normal">
                HIV DRUG <br/>RESISTANCE
            </a>
        </div>
        <ul class="nav">
            <li class="nav-item ">
                <a class="nav-link" href="/dash">
                    <i class="nc-icon nc-chart-pie-36 "></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="/eligible_samples">
                    <i class="nc-icon nc-grid-45"></i>
                    <p>D R Eligible Samples</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="/batches">
                    <i class="nc-icon nc-app"></i>
                    <p>Batches</p>
                </a>
            </li>   
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#tablesExamples3">
                    <i class="nc-icon nc-delivery-fast"></i>
                    <p>Referrals
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse " id="tablesExamples3">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="/referrals_deferrals/referred">
                                <span class="sidebar-mini">R</span>
                                <span class="sidebar-normal">Referred</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="/referrals_deferrals/deferred">
                                <span class="sidebar-mini">D</span>
                                <span class="sidebar-normal">Deferred</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="/referrals_deferrals/rejected">
                                <span class="sidebar-mini">R</span>
                                <span class="sidebar-normal">Rejected</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>  
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#tablesExamples4">
                    <i class="nc-icon nc-notes"></i>
                    <p>
                        HIV-DR Results
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse " id="tablesExamples4">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="/drug_resistance?status=amplified">
                                <span class="sidebar-mini">A</span>
                                <span class="sidebar-normal">Amplified</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="/drug_resistance?status=failed to amplify">
                                <span class="sidebar-mini">FA</span>
                                <span class="sidebar-normal">Failed to amplify</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item ">
                <a class="nav-link" href="/discussed">
                    <i class="nc-icon nc-circle"></i>
                    <p>Discussed</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="/assessments">
                    <i class="nc-icon nc-support-17"></i>
                    <p>Cohort Tracker</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#tablesExamples">
                    <i class="nc-icon nc-single-02"></i>
                    <p>
                        Patients
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse " id="tablesExamples">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="/patients">
                                <span class="sidebar-mini">P</span>
                                <span class="sidebar-normal">All Patients</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="/patients?type=old data">
                                <span class="sidebar-mini">O</span>
                                <span class="sidebar-normal">Old data (Manually entered)</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="/patients?type=out of care">
                                <span class="sidebar-mini">OC</span>
                                <span class="sidebar-normal">Out of Care</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="/patients?type=transfers">
                                <span class="sidebar-mini">T</span>
                                <span class="sidebar-normal">Transfers
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="/patients?type=backlog">
                                <span class="sidebar-mini">B</span>
                                <span class="sidebar-normal">Backlog Entry Reports</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
             <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#tablesExamples2">
                    <i class="nc-icon nc-settings-gear-64"></i>
                    <p>
                        Settings    
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse " id="tablesExamples2">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="./tables/regular.html">
                                <span class="sidebar-mini">UM</span>
                                <span class="sidebar-normal">User Management</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="./tables/extended.html">
                                <span class="sidebar-mini">T</span>
                                <span class="sidebar-normal">Transfers
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="./tables/bootstrap-table.html">
                                <span class="sidebar-mini">B</span>
                                <span class="sidebar-normal">Backlog 
                                Reports</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="./tables/datatables.net.html">
                                <span class="sidebar-mini">DT</span>
                                <span class="sidebar-normal">DataTables.net</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item ">
                <a class="nav-link" href="/users">
                    <i class="nc-icon nc-circle-09"></i>
                    <p>User management</p>
                </a>
            </li>
        </ul>
    </div>
</div>
