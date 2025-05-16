<?php
require '../database/db.php';

// marriage

$sql="SELECT COUNT(*) AS total FROM marriage_certificates";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$marriage_total_request=($row['total']) ? (int)$row['total'] :0;

$sql="SELECT COUNT(*) AS total FROM marriage_certificates WHERE status='pending'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$marriage_pendings_request=($row['total']) ? (int)$row['total'] : 0;
$marriage_pending_persentage=($marriage_total_request > 0) ? (float)($marriage_pendings_request / $marriage_total_request) * 100 : 0;

$sql="SELECT COUNT(*) AS total FROM marriage_certificates WHERE status='rejected'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$marriage_rejected_request=($row['total']) ? (int)$row['total'] : 0;
$marriage_rejected_persentage=($marriage_total_request > 0) ? (float)($marriage_rejected_request / $marriage_total_request) * 100 : 0;

$sql="SELECT COUNT(*) AS total FROM marriage_certificates WHERE status='approved'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$marriage_approved_request=($row['total']) ? (int)$row['total'] : 0;
$marriage_approved_persentage=($marriage_total_request > 0) ? (float)($marriage_approved_request / $marriage_total_request) * 100 : 0;

// birth

$sql="SELECT COUNT(*) AS total FROM birth_certificates";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$birth_total_request=($row['total']) ? (int)$row['total'] :0;

$sql="SELECT COUNT(*) AS total FROM birth_certificates WHERE status='pending'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$birth_pendings_request=($row['total']) ? (int)$row['total'] : 0;
$birth_pending_persentage=($birth_total_request > 0) ? (float)($birth_pendings_request / $birth_total_request) * 100 : 0;

$sql="SELECT COUNT(*) AS total FROM birth_certificates WHERE status='rejected'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$birth_rejected_request=($row['total']) ? (int)$row['total'] : 0;
$birth_rejected_persentage=($birth_total_request > 0) ? (float)($birth_rejected_request / $birth_total_request) * 100 : 0;

$sql="SELECT COUNT(*) AS total FROM birth_certificates WHERE status='approved'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$birth_approved_request=($row['total']) ? (int)$row['total'] : 0;
$birth_approved_persentage=($birth_total_request > 0) ? (float)($birth_approved_request / $birth_total_request) * 100 : 0;


// death

$sql="SELECT COUNT(*) AS total FROM death_certificates";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$death_total_request=($row['total']) ? (int)$row['total'] :0;

$sql="SELECT COUNT(*) AS total FROM death_certificates WHERE status='pending'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$death_pendings_request=($row['total']) ? (int)$row['total'] : 0;
$death_pending_persentage=($death_total_request > 0) ? (float)($death_pendings_request / $death_total_request) * 100 : 0;

$sql="SELECT COUNT(*) AS total FROM death_certificates WHERE status='rejected'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$death_rejected_request=($row['total']) ? (int)$row['total'] : 0;
$death_rejected_persentage=($death_total_request > 0) ? (float)($death_rejected_request / $death_total_request) * 100 : 0;

$sql="SELECT COUNT(*) AS total FROM death_certificates WHERE status='approved'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$death_approved_request=($row['total']) ? (int)$row['total'] : 0;
$death_approved_persentage=($death_total_request > 0) ? (float)($death_approved_request / $death_total_request) * 100 : 0;



// residential

$sql="SELECT COUNT(*) AS total FROM residential_certificates";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$residential_total_request=($row['total']) ? (int)$row['total'] :0;

$sql="SELECT COUNT(*) AS total FROM residential_certificates WHERE status='pending'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$residential_pendings_request=($row['total']) ? (int)$row['total'] : 0;
$residential_pending_persentage=($residential_total_request > 0) ? (float)($residential_pendings_request / $residential_total_request) * 100 : 0;

$sql="SELECT COUNT(*) AS total FROM residential_certificates WHERE status='rejected'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$residential_rejected_request=($row['total']) ? (int)$row['total'] : 0;
$residential_rejected_persentage=($residential_total_request > 0) ? (float)($residential_rejected_request / $residential_total_request) * 100 : 0;

$sql="SELECT COUNT(*) AS total FROM residential_certificates WHERE status='approved'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$residential_approved_request=($row['total']) ? (int)$row['total'] : 0;
$residential_approved_persentage=($residential_total_request > 0) ? (float)($residential_approved_request / $residential_total_request) * 100 : 0;

// No- Objection

$sql="SELECT COUNT(*) AS total FROM noc_certificates";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$noc_total_request=($row['total']) ? (int)$row['total'] :0;

$sql="SELECT COUNT(*) AS total FROM noc_certificates WHERE status='pending'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$noc_pendings_request=($row['total']) ? (int)$row['total'] : 0;
$noc_pending_persentage=($noc_total_request > 0) ? (float)($noc_pendings_request / $noc_total_request) * 100 : 0;

$sql="SELECT COUNT(*) AS total FROM noc_certificates WHERE status='rejected'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$noc_rejected_request=($row['total']) ? (int)$row['total'] : 0;
$noc_rejected_persentage=($noc_total_request > 0) ? (float)($noc_rejected_request / $noc_total_request) * 100 : 0;

$sql="SELECT COUNT(*) AS total FROM noc_certificates WHERE status='approved'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$noc_approved_request=($row['total']) ? (int)$row['total'] : 0;
$noc_approved_persentage=($noc_total_request > 0) ? (float)($noc_approved_request / $noc_total_request) * 100 : 0;



// user

$sql="SELECT COUNT(*) AS total FROM user";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$user_total_request=($row['total']) ? (int)$row['total'] :0;

$sql="SELECT COUNT(*) AS total FROM user WHERE approval='pending'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$user_pendings_request=($row['total']) ? (int)$row['total'] : 0;
$user_pending_persentage=($user_total_request > 0) ? (float)($user_pendings_request / $user_total_request) * 100 : 0;

$sql="SELECT COUNT(*) AS total FROM user WHERE approval='rejected'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$user_rejected_request=($row['total']) ? (int)$row['total'] : 0;
$user_rejected_persentage=($user_total_request > 0) ? (float)($user_rejected_request / $user_total_request) * 100 : 0;

$sql="SELECT COUNT(*) AS total FROM user WHERE approval='approved'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$user_approved_request=($row['total']) ? (int)$row['total'] : 0;
$user_approved_persentage=($user_total_request > 0) ? (float)($user_approved_request / $user_total_request) * 100 : 0;



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .cards-container{
            width: 100%;
            height: 100%;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            padding-bottom: 200px;
        }
        .card{
            border: 2px solid rgba(0, 0, 0, 0.3);
            height: 200px;
            margin: 0px auto;
            width: 30%;
            padding: 20px;
            position: relative;
            border-radius: 8px;
            background-color: rgba(255, 255, 255, 0.15);
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.4);
            transition: all .2s;
        }
        .card:hover{
            transform: scale(102%);
        }
        .inner-card{
            /* padding: 20px; */
            align-items: center;
            justify-content: space-between;
            display: flex;
            width: 100%;
            height: 100%;
        }
.marriage-circle{
    /* background-color: yellow; */
    width: 100px;
    height: 100px;
    border-radius: 50%;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    background: conic-gradient( 
rgb(234, 255, 0) 0% <?php echo $marriage_pending_persentage; ?>%, 
rgb(98, 255, 0) <?php echo $marriage_pending_persentage; ?>% <?php echo ($marriage_pending_persentage + $marriage_approved_persentage); ?>%, 
rgb(255, 0, 51) <?php echo ($marriage_pending_persentage + $marriage_approved_persentage); ?>% 100%);

        
}

.marriage-circle:after{
    content: "";
    position: absolute;
    height: 70px;
    width: 70px;
    background-color: white;
    border-radius: 50%;
}


.birth-circle{
    /* background-color: yellow; */
    width: 100px;
    height: 100px;
    border-radius: 50%;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    background: conic-gradient( 
rgb(234, 255, 0) 0% <?php echo $birth_pending_persentage; ?>%, 
rgb(98, 255, 0) <?php echo $birth_pending_persentage; ?>% <?php echo ($birth_pending_persentage + $birth_approved_persentage); ?>%, 
rgb(255, 0, 51) <?php echo ($birth_pending_persentage + $birth_approved_persentage); ?>% 100%);
}

.birth-circle:after{
    content: "";
    position: absolute;
    height: 70px;
    width: 70px;
    background-color: white;
    border-radius: 50%;
}

.death-circle{
    /* background-color: yellow; */
    width: 100px;
    height: 100px;
    border-radius: 50%;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    background: conic-gradient( 
rgb(234, 255, 0) 0% <?php echo $death_pending_persentage; ?>%, 
rgb(98, 255, 0) <?php echo $death_pending_persentage; ?>% <?php echo ($death_pending_persentage + $death_approved_persentage); ?>%, 
rgb(255, 0, 51) <?php echo ($death_pending_persentage + $death_approved_persentage); ?>% 100%);
}

.death-circle:after{
    content: "";
    position: absolute;
    height: 70px;
    width: 70px;
    background-color: white;
    border-radius: 50%;
}

.residential-circle{
    /* background-color: yellow; */
    width: 100px;
    height: 100px;
    border-radius: 50%;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    background: conic-gradient( 
rgb(234, 255, 0) 0% <?php echo $residential_pending_persentage; ?>%, 
rgb(98, 255, 0) <?php echo $residential_pending_persentage; ?>% <?php echo ($residential_pending_persentage + $residential_approved_persentage); ?>%, 
rgb(255, 0, 51) <?php echo ($residential_pending_persentage + $residential_approved_persentage); ?>% 100%);
}

.residential-circle:after{
    content: "";
    position: absolute;
    height: 70px;
    width: 70px;
    background-color: white;
    border-radius: 50%;
}
.noc-circle{
    /* background-color: yellow; */
    width: 100px;
    height: 100px;
    border-radius: 50%;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    background: conic-gradient( 
rgb(234, 255, 0) 0% <?php echo $noc_pending_persentage; ?>%, 
rgb(98, 255, 0) <?php echo $noc_pending_persentage; ?>% <?php echo ($noc_pending_persentage + $noc_approved_persentage); ?>%, 
rgb(255, 0, 51) <?php echo ($noc_pending_persentage + $noc_approved_persentage); ?>% 100%);
}

.noc-circle:after{
    content: "";
    position: absolute;
    height: 70px;
    width: 70px;
    background-color: white;
    border-radius: 50%;
}


.user-circle{
    /* background-color: yellow; */
    width: 100px;
    height: 100px;
    border-radius: 50%;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    background: conic-gradient( 
rgb(234, 255, 0) 0% <?php echo $user_pending_persentage; ?>%, 
rgb(98, 255, 0) <?php echo $user_pending_persentage; ?>% <?php echo ($user_pending_persentage + $user_approved_persentage); ?>%, 
rgb(255, 0, 51) <?php echo ($user_pending_persentage + $user_approved_persentage); ?>% 100%);
}

.user-circle:after{
    content: "";
    position: absolute;
    height: 70px;
    width: 70px;
    background-color: white;
    border-radius: 50%;
}


.percentage{
    position: relative;
    z-index: 500;
}

.info{
    width: 50%;
}
.info p{
    padding: 3px 0;
}

/* .total{
    display: inline-block;
    width: 12px;
    height: 12px;
    background-color: rgb(255, 0, 255);
    border: 1px solid black;
} */
.pending{
    display: inline-block;
    width: 12px;
    height: 12px;
    background-color: rgb(234, 255, 0);
    border: 1px solid black;
}
.approved{
    display: inline-block;
    width: 12px;
    height: 12px;
    background-color: rgb(98, 255, 0);
    border: 1px solid black;
}
.rejected{
    display: inline-block;
    width: 12px;
    height: 12px;
    background-color: rgb(255, 0, 51);
    border: 1px solid black;
}
    </style>
</head>
<body>
    <div class="cards-container">
        <div class="card">
            <h3>Marriage Requests</h3>
            <div class="inner-card">
                <div class="marriage-circle">
                    <p class="percentage">Total :<?php echo $marriage_total_request ?></p>
                </div>
                <div class="info">
                    <p><span class="total"> </span> Total : <?php echo $marriage_total_request?></p>
                    <p><span class="pending"> </span> Pendings : <?php echo $marriage_pendings_request?></p>
                    <p><span class="approved"> </span> Approved : <?php echo $marriage_approved_request?></p>
                    <p><span class="rejected"> </span> Rejected : <?php echo $marriage_rejected_request?></p>
                </div>
                </div>
        </div>

        <div class="card">
            <h3>Birth Requests</h3>
            <div class="inner-card">
                <div class="birth-circle">
                    <p class="percentage">Total :<?php echo $birth_total_request ?></p>
                </div>
                <div class="info">
                <p><span class="total"> </span> Total : <?php echo $birth_total_request?></p>
                    <p><span class="pending"> </span> Pendings : <?php echo $birth_pendings_request?></p>
                    <p><span class="approved"> </span> Approved : <?php echo $birth_approved_request?></p>
                    <p><span class="rejected"> </span> Rejected : <?php echo $birth_rejected_request?></p>
                </div>
                </div>
        </div>

        <div class="card">
            <h3>Death Requests</h3>
            <div class="inner-card">
                <div class="death-circle">
                    <p class="percentage">Total :<?php echo $death_total_request ?></p>
                </div>
                <div class="info">
                <p><span class="total"> </span> Total : <?php echo $death_total_request?></p>
                    <p><span class="pending"> </span> Pendings : <?php echo $death_pendings_request?></p>
                    <p><span class="approved"> </span> Approved : <?php echo $death_approved_request?></p>
                    <p><span class="rejected"> </span> Rejected : <?php echo $death_rejected_request?></p>
                </div>
                </div>
        </div>
     
        <div class="card">
            <h3>Residential Requests</h3>
            <div class="inner-card">
                <div class="residential-circle">
                    <p class="percentage">Total :<?php echo $residential_total_request ?></p>
                </div>
                <div class="info">
                <p><span class="total"> </span> Total : <?php echo $residential_total_request?></p>
                    <p><span class="pending"> </span> Pendings : <?php echo $residential_pendings_request?></p>
                    <p><span class="approved"> </span> Approved : <?php echo $residential_approved_request?></p>
                    <p><span class="rejected"> </span> Rejected : <?php echo $residential_rejected_request?></p>
                </div>
                </div>
        </div>

        <div class="card">
            <h3>No-Objection Requests</h3>
            <div class="inner-card">
                <div class="noc-circle">
                    <p class="percentage">Total :<?php echo $noc_total_request ?></p>
                </div>
                <div class="info">
                <p><span class="total"> </span> Total : <?php echo $noc_total_request?></p>
                    <p><span class="pending"> </span> Pendings : <?php echo $noc_pendings_request?></p>
                    <p><span class="approved"> </span> Approved : <?php echo $noc_approved_request?></p>
                    <p><span class="rejected"> </span> Rejected : <?php echo $noc_rejected_request?></p>
                </div>
                </div>
        </div>

         <div class="card">
            <h3>user Requests</h3>
            <div class="inner-card">
                <div class="user-circle">
                    <p class="percentage">Total :<?php echo $user_total_request ?></p>
                </div>
                <div class="info">
                <p><span class="total"> </span> Total : <?php echo $user_total_request?></p>
                    <p><span class="pending"> </span> Pendings : <?php echo $user_pendings_request?></p>
                    <p><span class="approved"> </span> Approved : <?php echo $user_approved_request?></p>
                    <p><span class="rejected"> </span> Rejected : <?php echo $user_rejected_request?></p>
                </div>
                </div>
        </div>
    </div>
</body>
</html>




