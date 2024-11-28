<div class="container">
  <div class="row">
    <div class="col-12">
      <h2 class="mt-5">My Profile</h2>
      <hr />
    </div>

    <?php
    include "profile-read.php";

    if (isset($_GET['status'])) {
      if ($_GET['status'] === "success") {
        echo "<div class='alert alert-success'>Profile updated successfully!</div>";
      } elseif ($_GET['status'] === "error") {
        echo "<div class='alert alert-danger'>Failed to update profile.</div>";
      }
    }

    if ($profile) {
      echo "<form id='profileForm' class='w-100' action='index.php?page=profile-update' method='POST'>";
      echo "<div id='profileCard' class='card mb-4 shadow-sm w-100'>";
      echo "<div class='card-body'>";
      echo "<div class='list-group'>";

      foreach (['Username' => 'usr', 'Email' => 'email', 'Name' => 'name', 'NIM' => 'nim', 'Phone' => 'phone', 'Description' => 'description'] as $label => $key) {
        echo "<div class='list-group-item d-flex align-items-center py-2'>";
        echo "<strong style='width: 100px;'>{$label}</strong>";
        echo "<span class='mr-1'>:</span>";
        echo "<span class='editable flex-grow-1' data-name='{$key}'>{$profile[$key]}</span>";
        echo "</div>";
      }

      echo "<div id='passwordField' class='list-group-item align-items-center py-2 d-none'>";
      echo "<strong style='width: 100px;'>Password</strong>";
      echo "<span class='mr-1 ml-2'>:</span>";
      echo "<input type='password' name='psw' class='border-0' placeholder='Enter new password'>";
      echo "</div>";

      echo "</div>";
      echo "</div>";
      echo "<div class='card-footer text-end bg-white'>";
      echo "<button id='editProfileBtn' type='button' class='btn text-white' style='background-color:#113448'>Update Profile</button>";
      echo "<button id='cancelEditBtn' type='button' class='btn btn-secondary d-none mr-2'>Cancel</button>";
      echo "<button id='saveProfileBtn' type='submit' class='btn btn-success d-none'>Save Profile</button>";
      echo "</div>";
      echo "</div>";
      echo "</form>";
    }
    ?>
  </div>
</div>

<script>
  const editProfileBtn = document.getElementById("editProfileBtn");
  const saveProfileBtn = document.getElementById("saveProfileBtn");
  const cancelEditBtn = document.getElementById("cancelEditBtn");
  const passwordField = document.getElementById("passwordField");
  const editableFields = document.querySelectorAll(".editable");

  editProfileBtn.addEventListener("click", () => {
    editableFields.forEach(field => {
      const value = field.textContent.trim();
      const name = field.dataset.name;
      field.innerHTML = `<input type="text" name="${name}" value="${value}" />`;
    });

    passwordField.classList.remove('d-none');
    passwordField.classList.add('d-flex');
    editProfileBtn.classList.add("d-none");
    saveProfileBtn.classList.remove("d-none");
    cancelEditBtn.classList.remove("d-none");
  });

  cancelEditBtn.addEventListener("click", () => {
    editableFields.forEach(field => {
      const input = field.querySelector("input");
      if (input) {
        field.textContent = input.value;
      }
    });

    passwordField.classList.add('d-none');
    passwordField.classList.remove('d-flex');
    editProfileBtn.classList.remove("d-none");
    saveProfileBtn.classList.add("d-none");
    cancelEditBtn.classList.add("d-none");
  });

  window.onload = function() {
    const status = new URLSearchParams(window.location.search).get('status');
    if (status) {
      setTimeout(function() {
        window.location.href = "/index.php?page=user-profile";
      }, 2000);
    }
  };
</script>

<style>
  .editable input {
    border: none;
    background: transparent;
    outline: none;
    width: 100%;
    font-size: 1rem;
    color: #333;
    padding: 0;
  }

  .editable input:focus {
    border-bottom: 1px solid #113448;
    outline: none;
  }

  #passwordField input {
    width: 100%;
  }
</style>