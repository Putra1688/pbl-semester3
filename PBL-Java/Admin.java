class Admin extends User implements PenggunaFitur {
    public Admin(String username, String password) {
        super(username, password);
    }

    @Override
    public void lihatPengumuman() {
        System.out.println("Pengumuman: Jadwal taklim terbaru minggu ini telah diupdate.");
    }

    @Override
    public void lihatDaftarUstadz() {
        System.out.println("Daftar Ustadz: Ustadz Ahmad, Ustadz Budi, dll.");
    }

    @Override
    public void lihatKontakPerson() {
        System.out.println("Kontak Person: Ustadz Ahmad - 08123456789");
    }

    public void updateJadwalTaklim() {
        System.out.println("Jadwal taklim berhasil diupdate.");
    }
}
