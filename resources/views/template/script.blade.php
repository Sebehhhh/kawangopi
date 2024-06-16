  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('assets/landingpage/lib/wow/wow.min.js') }}"></script>
  <script src="{{ asset('assets/landingpage/lib/easing/easing.min.js') }}"></script>
  <script src="{{ asset('assets/landingpage/lib/waypoints/waypoints.min.js') }}"></script>
  <script src="{{ asset('assets/landingpage/lib/counterup/counterup.min.js') }}"></script>
  <script src="{{ asset('assets/landingpage/lib/owlcarousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('assets/landingpage/lib/tempusdominus/js/moment.min.js') }}"></script>
  <script src="{{ asset('assets/landingpage/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
  <script src="{{ asset('assets/landingpage/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

  <!-- Template Javascript -->
  <script src="{{ asset('assets/landingpage/js/main.js') }}"></script>

  <script>
      document.addEventListener('DOMContentLoaded', function() {
          const successAlert = document.getElementById('success-alert');
          if (successAlert) {
              setTimeout(() => {
                  successAlert.style.opacity = '0';
                  setTimeout(() => successAlert.remove(), 500);
              }, 3000);
          }
      });
  </script>
