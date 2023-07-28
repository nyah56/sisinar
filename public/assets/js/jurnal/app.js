const fetchSeminar = async (id) => {
    try {
        const response = await fetch(`/seminar/${id}`);
        const data = await response.json();
        return data.jenis_seminar;
    } catch (error) {
        return {}; // Return an empty object if there's an error
    }
};

const statusLabels = {
    1: "Submision",
    2: "Review",
    3: "Menunggu Revisi",
    4: "Accepted",
    5: "Copy Editing",
    6: "Production",
    7: "Publish",
};
const paidLabels = {
    0: "Belum Lunas",
    1: "Lunas",
};
const kehadiranLabels = {
    0: "Offline",
    1: "Online",
};
let detail = document.querySelectorAll(".btn-detail");
document.querySelectorAll(".openModalButton").forEach((button) => {
    button.addEventListener("click", async function () {
        const itemId = this.dataset.id;
        const modalTitleElement = document.querySelector(".modal-title");
        modalTitleElement.textContent = "Submission -  " + itemId;

        try {
            // Perform an AJAX request to fetch data by ID
            const modalDataContainer =
                document.getElementById("modalDataContainer");
            modalDataContainer.innerHTML = ` <form class="form-horizontal row-border" >
                                          
                                          <div class="form-group">
                                              <label class="col-md-3 control-label">Judul</label>
                                             
                                             
                                              <div class="col-md-8">
                                                  <textarea class="form-control autosize" name="catatan" style="overflow: hidden; overflow-wrap: break-word; resize: horizontal; height: 120px;" value disabled></textarea>
                                              </div>
                                            
                                             
                                          </div>
                                          <div class="form-group">
                                              <label class="col-md-3 control-label">Nama</label>
                                              <div class="col-md-8">
                                                  <input type="text" name="nama"class="form-control"required value=""disabled>
                                              </div>
                                              
                                          </div>
                                          <div class="form-group">
                                              <label class="col-md-3 control-label">Email</label>
                                              <div class="col-md-8">
                                                  <input type="email" name="email"class="form-control" value="" disabled>
                                              </div>
                                             
                                          </div>
                                          <div class="form-group">
                                              <label class="col-md-3 control-label">Aviliasi</label>
                                              <div class="col-md-8">
                                                  <input type="text" name="aviliasi"class="form-control" value=""disabled>
                                              </div>
                                              
                                          </div>
                                        
                                          <div class="form-group">
                                              <label class="col-md-3 control-label">No.WA</label>
                                              <div class="col-md-8">
                                                  <input type="text" name="wa"class="form-control" value=""disabled>
                                              </div>
                                              
                                          </div>
                                          <div class="form-group">
                                              <label class="col-md-3 control-label">Jenis Seminar</label>
                                              <div class="col-md-8">
                                                  <input type="text" name="wa"class="form-control" value=""disabled>
                                              </div>
                                              
                                          </div>
                                          <div class="form-group">
                                              <label class="col-md-3 control-label">Status</label>
                                              <div class="col-md-8">
                                                  <input type="text" name="wa"class="form-control" value=""disabled>
                                              </div>
                                              
                                          </div>
                                          <div class="form-group">
                                              <label class="col-md-3 control-label">Pembayaran</label>
                                              <div class="col-md-8">
                                                  <input type="text" name="wa"class="form-control" value=""disabled>
                                              </div>
                                              
                                          </div>
                                          <div class="form-group">
                                              <label class="col-md-3 control-label">Kehadiran</label>
                                              <div class="col-md-8">
                                                  <input type="text" name="wa"class="form-control" value=""disabled>
                                              </div>
                                              
                                          </div>
                                          <div class="form-group">
                                              <label class="col-md-3 control-label">Catatan</label>
                                              <div class="col-md-8">
                                                  <textarea class="form-control autosize" name="catatan" style="overflow: hidden; overflow-wrap: break-word; resize: horizontal; height: 250px;" @disabled(true)></textarea>
                                              </div>
                                            
                                          </div>
                                          
                                      </form>`;
            const response = await fetch(`/jurnal/detail/${itemId}`);
            const data = await response.json();
            // console.log(itemId);
            // console.log(data);
            // Populate the modal fields with the fetched data
            const jenisSeminar = await fetchSeminar(data.kode_seminar);
            const statusLabel = statusLabels[data.status] || "Unknown";
            const paidLabel = paidLabels[data.pembayaran] || "Unknown";
            modalDataContainer.innerHTML = `
            <form class="form-horizontal row-border" >
                                          
                                          <div class="form-group">
                                              <label class="col-md-3 control-label">Judul</label>
                                             
                                             
                                              <div class="col-md-8">
                                                  <textarea class="form-control autosize" name="catatan" style="overflow: hidden; overflow-wrap: break-word; resize: horizontal; height: 120px;" value disabled>${data.judul}</textarea>
                                              </div>
                                            
                                             
                                          </div>
                                          <div class="form-group">
                                              <label class="col-md-3 control-label">Nama</label>
                                              <div class="col-md-8">
                                                  <input type="text" name="nama"class="form-control"required  value="${data.nama}"disabled>
                                              </div>
                                              
                                          </div>
                                          <div class="form-group">
                                              <label class="col-md-3 control-label">Email</label>
                                              <div class="col-md-8">
                                                  <input type="email" name="email"class="form-control" value="${data.email}" disabled>
                                              </div>
                                             
                                          </div>
                                          <div class="form-group">
                                              <label class="col-md-3 control-label">Aviliasi</label>
                                              <div class="col-md-8">
                                                  <input type="text" name="aviliasi"class="form-control" value="${data.aviliasi}"disabled>
                                              </div>
                                              
                                          </div>
                                        
                                          <div class="form-group">
                                              <label class="col-md-3 control-label">No.WA</label>
                                              <div class="col-md-8">
                                                  <input type="text" name="wa"class="form-control" value="${data.no_wa}"disabled>
                                              </div>
                                              
                                          </div>
                                          <div class="form-group">
                                              <label class="col-md-3 control-label">Jenis Seminar</label>
                                              <div class="col-md-8">
                                                  <input type="text" name="wa"class="form-control" value="${jenisSeminar}"disabled>
                                              </div>
                                              
                                          </div>
                                          <div class="form-group">
                                              <label class="col-md-3 control-label">Status</label>
                                              <div class="col-md-8">
                                                  <input type="text" name="wa"class="form-control" value="${statusLabel}"disabled>
                                              </div>
                                              
                                          </div>
                                          <div class="form-group">
                                              <label class="col-md-3 control-label">Pembayaran</label>
                                              <div class="col-md-8">
                                                  <input type="text" name="wa"class="form-control" value="${paidLabel}"disabled>
                                              </div>
                                              
                                          </div>
                                          <div class="form-group">
                                              <label class="col-md-3 control-label">Kehadiran</label>
                                              <div class="col-md-8">
                                                  <input type="text" name="wa"class="form-control" value="Masih blum ada"disabled>
                                              </div>
                                              
                                          </div>
                                          <div class="form-group">
                                              <label class="col-md-3 control-label">Catatan</label>
                                              <div class="col-md-8">
                                                  <textarea class="form-control autosize" name="catatan" style="overflow: hidden; overflow-wrap: break-word; resize: horizontal; height: 250px;" disabled>${data.catatan}</textarea>
                                              </div>
                                            
                                          </div>
                                          
                                      </form>
            `;

            // Show the modal (same as before)
            // const modal = new bootstrap.Modal(document.getElementById('detailData'));
            // modal.show();
        } catch (error) {
            console.error("Error fetching data:", error);
        }
    });
});
