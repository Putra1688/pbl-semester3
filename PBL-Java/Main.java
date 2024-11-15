import java.util.Scanner;

public class Main {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);

        // Membuat contoh data admin dan santri
        Admin admin = new Admin("admin", "admin123");
        Santri santri = new Santri("santri", "santri123");

        System.out.print("Username: ");
        String username = scanner.nextLine();
        System.out.print("Password: ");
        String password = scanner.nextLine();

        User user = null;

        // Login proses
        if (admin.login(username, password)) {
            user = admin;
            System.out.println("Login sebagai Admin");
        } else if (santri.login(username, password)) {
            user = santri;
            System.out.println("Login sebagai Santri");
        } else {
            System.out.println("Login gagal. Masuk sebagai tamu.");
        }

        // Menu pilihan
        while (true) {
            System.out.println("\nMenu:");
            System.out.println("1. Lihat Pengumuman");
            System.out.println("2. Lihat Daftar Ustadz dan Kitab Taklim");
            System.out.println("3. Lihat Kontak Person");

            if (user instanceof Santri) {
                System.out.println("4. Lihat Jadwal Taklim");
            } else if (user instanceof Admin) {
                System.out.println("5. Update Jadwal Taklim");
            }

            System.out.print("Pilih opsi (0 untuk keluar): ");
            int choice = scanner.nextInt();

            switch (choice) {
                case 0:
                    System.out.println("Keluar dari sistem.");
                    return;
                case 1:
                    ((PenggunaFitur) user).lihatPengumuman();
                    break;
                case 2:
                    ((PenggunaFitur) user).lihatDaftarUstadz();
                    break;
                case 3:
                    ((PenggunaFitur) user).lihatKontakPerson();
                    break;
                case 4:
                    if (user instanceof Santri) {
                        ((Santri) user).lihatJadwalTaklim();
                    } else {
                        System.out.println("Opsi tidak tersedia.");
                    }
                    break;
                case 5:
                    if (user instanceof Admin) {
                        ((Admin) user).updateJadwalTaklim();
                    } else {
                        System.out.println("Opsi tidak tersedia.");
                    }
                    break;
                default:
                    System.out.println("Pilihan tidak valid.");
                    break;
            }
        }
    }
}
