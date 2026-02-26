@extends('layouts.master')

@section('content')

<style>
  .profile-container { max-width: 1000px; margin: 30px auto; font-family: Arial, sans-serif; background:#fff; border-radius:8px; overflow:hidden; box-shadow:0 2px 8px rgba(0,0,0,0.1); }
  .profile-header { display:flex; flex-wrap:wrap; gap:20px; align-items:center; padding:20px; background:#f8f9fa; border-bottom:1px solid #ddd; }
  .profile-header img { width:140px; height:140px; object-fit:cover; border-radius:8px; border:2px solid #a3003b; }
  .profile-header h2 { margin:0; font-size:26px; color:#6b0e3d; }
  .profile-section { padding:20px; }
  .section-title { font-size:20px; color:#a3003b; margin-bottom:15px; border-bottom:2px solid #eee; padding-bottom:5px; }
  .info-grid { display:grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap:15px; }
  .info-item { background:#fafafa; padding:12px; border-left:5px solid #a3003b; border-radius:6px; }
  .info-item strong { display:block; color:#333; margin-bottom:4px; }
  @media(max-width:600px){ .profile-header { text-align:center; justify-content:center; } .profile-header img { margin:auto; } }
</style>

 
<div class="profile-container">
  <div class="profile-header">
    <img src="{{ asset('profile.jpeg') }}" alt="Student Photo">
    <div>
      <h2>MD EZAZ AHMMED</h2>
      <div>
        BACHELOR OF BUSINESS ADMINISTRATION (BBA) | ID: 1814793124      </div>
    </div>
  </div>

      <div class="profile-section">
      <div class="section-title">ACADEMIC INFORMATION</div>
      <div class="info-grid">
                  <div class="info-item">
            <strong>REGISTRATION NUMBER:</strong>
            33745724          </div>
                  <div class="info-item">
            <strong>PROGRAM:</strong>
            BACHELOR OF BUSINESS ADMINISTRATION (BBA)          </div>
                  <div class="info-item">
            <strong>MAJOR 1:</strong>
            ACCOUNTING INFORMATION SYSTEM          </div>
                  <div class="info-item">
            <strong>ENROLMENT SEMESTER:</strong>
            SPRING 2019          </div>
                  <div class="info-item">
            <strong>PASSING YEAR:</strong>
            SPRING 2023          </div>
                  <div class="info-item">
            <strong>CREDIT COMPLETED:</strong>
            126          </div>
                  <div class="info-item">
            <strong>CGPA:</strong>
            3.50          </div>
                  <div class="info-item">
            <strong>RESULT PUBLICATION&#039;S DATE:</strong>
            21ST MARCH 2023          </div>
                  <div class="info-item">
            <strong>CURRENT STATUS:</strong>
            GRADUATED          </div>
                  <div class="info-item">
            <strong>CERTIFICATE SERIAL:</strong>
            04322          </div>
              </div>
    </div>
  
      <div class="profile-section">
      <div class="section-title">PERSONAL INFORMATION</div>
      <div class="info-grid">
                  <div class="info-item">
            <strong>DATE OF BIRTH:</strong>
            22ND JUNE 1998          </div>
                  <div class="info-item">
            <strong>GENDER:</strong>
            MALE          </div>
                  <div class="info-item">
            <strong>BLOOD GROUP:</strong>
            A+          </div>
                  <div class="info-item">
            <strong>NATIONALITY:</strong>
            BANGLADESHI          </div>
                  <div class="info-item">
            <strong>MARITAL STATUS:</strong>
            UNMARRIED          </div>
                  <div class="info-item">
            <strong>RELIGION:</strong>
            ISLAM          </div>
                  <div class="info-item">
            <strong>NID / PASSPORT NO:</strong>
            6013435240          </div>
                  <div class="info-item">
            <strong>EMAIL:</strong>
            EZAZ@SOUTHASIAUNI.AC.BD          </div>
                  <div class="info-item">
            <strong>MOBILE:</strong>
            +8801610820531          </div>
                  <div class="info-item">
            <strong>PRESENT ADDRESS:</strong>
            HOSENPUR, BHERAMARA, JOGOSHWAR-7040, KUSHTIA          </div>
                  <div class="info-item">
            <strong>PERMANENT ADDRESS:</strong>
            HOSENPUR, BHERAMARA, JOGOSHWAR-7040, KUSHTIA          </div>
              </div>
    </div>
  
      <div class="profile-section">
      <div class="section-title">GUARDIAN INFORMATION</div>
      <div class="info-grid">
                  <div class="info-item">
            <strong>FATHER&#039;S NAME:</strong>
            MD REZAUL HAQUE          </div>
                  <div class="info-item">
            <strong>FATHER&#039;S OCCUPATION:</strong>
            FARMER          </div>
                  <div class="info-item">
            <strong>MOTHER&#039;S NAME:</strong>
            MST ROMELA KHATUN          </div>
                  <div class="info-item">
            <strong>MOTHER&#039;S OCCUPATION:</strong>
            HOUSE WIFE          </div>
                  <div class="info-item">
            <strong>EMERGENCY CONTACT:</strong>
            MD REZAUL HAQUE          </div>
                  <div class="info-item">
            <strong>GUARDIAN CONTACT:</strong>
            +8801610820531          </div>
              </div>
    </div>
  
      <div class="profile-section">
      <div class="section-title">SIGNATURE</div>
      <img src="{{ asset('signature.jpeg') }}" alt="Signature" style="max-width:220px; display:block;">
    </div>
  </div>

@endsection
