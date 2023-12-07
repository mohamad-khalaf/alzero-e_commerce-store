

<header>
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand" href="#">brand</a>
            <button class="navbar-toggler" type="button" 
                    data-bs-toggle="collapse" 
                    data-bs-target="#navbarSupportedContent" 
                    aria-controls="navbarSupportedContent" 
                    aria-expanded="false" 
                    aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">this page</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Add_Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Mohamad </a>
                        <ul class="dropdown-menu">
                            <li> <a  class="dropdown-item   " href="#"                                                               > Setting        </a> </li>
                            <li> <a  class="dropdown-item   " href="#"                                                               > Setting        </a> </li>
                            <li> <hr class="dropdown-divider"                                                                        >                     </li>
                            <li> <a  class="dropdown-item   " href=<?php echo "members.php?do=edit&userid=" . $_SESSION["userID"] ?> > member         </a> </li>
                            <li> <a  class="dropdown-item   " href=<?php echo "members.php?do=edit&userid=" . $_SESSION["userID"] ?> > Edit Profile   </a> </li>
                            <li> <a  class="dropdown-item   " href=<?php echo "members.php?do=insert"                             ?> > insert user    </a> </li>
                            <li> <a  class="dropdown-item   " href=<?php echo "members.php?do=update"                             ?> > update         </a> </li>
                            <li> <a  class="dropdown-item   " href=<?php echo "members.php?do=edit&userid=" . $_SESSION["userID"] ?> > Edit Profile   </a> </li>
                            <li> <a  class="dropdown-item   " href=<?php echo "members.php?do=edit&userid=" . $_SESSION["userID"] ?> > Edit Profile   </a> </li>
                            <li> <hr class="dropdown-divider"                                                                        >                     </li>
                            <li> <a  class="dropdown-item   " href="logout.php"                                                      > Logout         </a> </li>
                        </ul>



                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
