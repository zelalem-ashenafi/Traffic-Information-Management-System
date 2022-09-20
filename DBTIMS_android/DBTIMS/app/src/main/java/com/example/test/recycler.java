package com.example.test;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

public class recycler extends RecyclerView.Adapter<recycler.ViewHolder> {
    Context c;
    String[] date;
    String[] level;
    String[] reason;

    public recycler(Context context, String[] dates,String[] levels,String[] reasons)
    {
        c=context;
        date=dates;
        level=levels;
        reason=reasons;
    }

    @NonNull
    @Override
    public recycler.ViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        LayoutInflater inflater= LayoutInflater.from(c);
        View view = inflater.inflate(R.layout.activity_penality_list,parent,false);
        return new ViewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull recycler.ViewHolder holder, int position) {

    }

    @Override
    public int getItemCount() {
        return 0;
    }

    public class ViewHolder extends RecyclerView.ViewHolder{
        TextView d,l,r;
        public ViewHolder(@NonNull View itemView) {
            super(itemView);
            d= itemView.findViewById(R.id.reason);
            d= itemView.findViewById(R.id.level);
            d= itemView.findViewById(R.id.punish_date);
        }
    }
}

