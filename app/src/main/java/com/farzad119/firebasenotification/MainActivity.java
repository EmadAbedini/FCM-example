package com.farzad119.firebasenotification;

import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.widget.CheckBox;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity {
    private CheckBox notificationCheckbox;
    private MySharedPreference mySharedPreference;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        mySharedPreference = new MySharedPreference(this);
        notificationCheckbox = findViewById(R.id.subscribe);
        boolean sentToken = mySharedPreference.hasUserSubscribeToNotification();
        if (sentToken) {
            notificationCheckbox.setChecked(true);
            notificationCheckbox.setEnabled(false);
            notificationCheckbox.setText(getString(R.string.registered));
            Toast.makeText(this, getString(R.string.registered), Toast.LENGTH_SHORT).show();
        } else {
            notificationCheckbox.setChecked(false);
            notificationCheckbox.setEnabled(false);
            notificationCheckbox.setText(getString(R.string.registered));
            Toast.makeText(this, getString(R.string.un_register), Toast.LENGTH_SHORT).show();
        }
    }

    @Override
    protected void onResume() {
        super.onResume();
    }

    @Override
    protected void onPause() {
        super.onPause();
    }


}
