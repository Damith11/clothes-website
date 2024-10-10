<?php
if (isset($success_msg) && is_array($success_msg)) {
    foreach ($success_msg as $msg) {
        echo '<script> swal("' . $msg . '", "", "success") </script>';
    }
} elseif (isset($success_msg)) {
    echo '<script> swal("' . $success_msg . '", "", "success") </script>';
}

if (isset($warning_msg) && is_array($warning_msg)) {
    foreach ($warning_msg as $msg) {
        echo '<script> swal("' . $msg . '", "", "warning") </script>';
    }
} elseif (isset($warning_msg)) {
    echo '<script> swal("' . $warning_msg . '", "", "warning") </script>';
}

if (isset($info_msg) && is_array($info_msg)) {
    foreach ($info_msg as $msg) {
        echo '<script> swal("' . $msg . '", "", "info") </script>';
    }
} elseif (isset($info_msg)) {
    echo '<script> swal("' . $info_msg . '", "", "info") </script>';
}

if (isset($error_msg) && is_array($error_msg)) {
    foreach ($error_msg as $msg) {
        echo '<script> swal("' . $msg . '", "", "error") </script>';
    }
} elseif (isset($error_msg)) {
    echo '<script> swal("' . $error_msg . '", "", "error") </script>';
}
?>
